let remaining = 15 * 60; // seconds
(function(){
      const timerEl = document.getElementById('timer');
      const content = document.getElementById('content');

      function formatTime(s){
        const mm = Math.floor(s / 60).toString().padStart(2,'0');
        const ss = (s % 60).toString().padStart(2,'0');
        return mm + ':' + ss;
      }

      timerEl.textContent = formatTime(remaining);

      const interval = setInterval(() => {
        remaining -= 1;
        if (remaining <= 0) {
          clearInterval(interval);
          // Replace content with an educational final message
          content.innerHTML = `
            <h1>SUPPRESSION DE L'ORDINATEUR.</h1>
            <p class="notice">Vous auriez dû me payer.</p>
            <ul>
              <li>Vous auriez vraiment dû me payer</li>
              <li>J'avais vraiment besoin de cet argent</li>
              <li>Discord Nitro ça coûte cher</li>
            </ul>
          `;
          return;
        }
        timerEl.textContent = formatTime(remaining);
      }, 1000);

      // Simple UX: focus input on load
      document.getElementById('userInput').focus();
})();

const form = document.getElementById('formCode');
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    if (remaining <= 0) return;
    const userInput = document.getElementById('userInput').value;
    if (userInput !== 'mot de passe') {
        document.getElementById('errorMsg').style.display = 'block';
        return;
    }
    for (item of [
        document.getElementById('errorMsg'),
        form,
        document.getElementById('timerDiv')
    ]) {
        item.style.display = 'none';
    }
    titre = document.getElementById('title');
    titre.textContent = 'Ordinateur déverrouillé!';
    titre.style.color = 'limegreen';
    msgExplication = document.getElementById('msgExplication');
    msgExplication.innerHTML = 'Félicitations! Vous avez déverrouillé l\'ordinateur! :)';
});