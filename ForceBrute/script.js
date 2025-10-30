const startBtn = document.getElementById('startBrute');
const stopBtn = document.getElementById('stopBrute');
const fillBtn = document.getElementById('fillToNormal');
const bfPasswords = document.getElementById('bf-passwords');
const bfUsername = document.getElementById('bf-username');
const bfStatus = document.getElementById('bf-status');
const normalPassword = document.getElementById('normal-password');
const normalUsername = document.getElementById('normal-username');
const fakeLogin = document.getElementById('fakeLogin');
let intervalId = null;
let index = 0;
let list = [];
const targetPassword = String.fromCharCode(...[70,111,114,116,110,105,116,101,49,50,51,52]);
const STEP_MS = 500;
function parseList(text){
  return text.split(/\r?\n/).map(s=>s.trim()).filter(s=>s.length>0);
}

function setStatus(text, cls){
  bfStatus.textContent = text;
  bfStatus.className = 'status ' + (cls||'');
}

startBtn.addEventListener('click', ()=>{
  list = parseList(bfPasswords.value);
  if(list.length === 0){
    setStatus('Dude, mets au moins un mot de passe.', 'warn');
    return;
  }
  if (bfUsername.value.trim().length === 0) {
    setStatus('Dude, mets un nom d\'utilisateur cible.', 'warn');
    return;
  }
  normalUsername.value = bfUsername.value.trim();
  index = 0;
  startBtn.disabled = true;
  stopBtn.disabled = false;
  setStatus('En marche — un mot de passe par ' + (STEP_MS/1000) + 's');
  intervalId = setInterval(()=>{
    const current = list[index % list.length];
    normalPassword.value = current;
    normalUsername.value = bfUsername.value.trim();
    setStatus('En ce moment: ' + (current.length>30? current.slice(0,27)+'...': current));
    if(current === targetPassword && normalUsername.value === 'Sir_PurpleHat'){
      clearInterval(intervalId);
      intervalId = null;
      startBtn.disabled = false;
      stopBtn.disabled = true;
      setStatus('Mot de passe trouvé : ' + current, 'success');
    }
    index++;
  }, STEP_MS);
});

stopBtn.addEventListener('click', ()=>{
  if(intervalId){
    clearInterval(intervalId);
    intervalId = null;
    setStatus('Stoppé par l\'utilisateur, essais :' + Math.max(0,index-1));
    startBtn.disabled = false;
    stopBtn.disabled = true;
  }
});

fakeLogin.addEventListener('click', ()=>{
  const u = normalUsername.value || '(empty)';
  const p = normalPassword.value || '(empty)';
  if (u === 'Sir_PurpleHat' && p === targetPassword) {
    alert('Connexion réussie!\nVoici votre code de ransomware : mot de passe');
    return;
  }
  alert('Échec de la connexion pour le nom d\'utilisateur "' + u + '" avec le mot de passe "' + p + '".');
});
window.addEventListener('keydown', (e)=>{
  if(e.key === 'Enter' && (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA')){
    if(e.target.tagName !== 'TEXTAREA') e.preventDefault();
  }
});