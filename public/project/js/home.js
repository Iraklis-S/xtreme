//CLOCK POP UP
document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('popup');
    var startBtn = document.getElementById('start-btn');

    // Function to hide the popup when the start button is clicked
    function hidePopup() {
        popup.classList.add('hidden');
    }

    // Add an event listener to the start button
    startBtn.addEventListener('click', hidePopup);
});




// optimised the code > with the symbol parameter so that it can be called with different parameters from the onclick in HTML

new TradingView.widget({
    "autosize": true,
    "symbol": "BITSTAMP:EURUSD",
    "interval": "45",
    "timezone": "Etc/UTC",
    "theme": "dark",
    "style": "1",
    "locale": "en",
    "toolbar_bg": "#f1f3f6",
    "enable_publishing": false,
    "allow_symbol_change": false,
    "container_id": "tradingview_2cd9b"
});

function changeSymbol(symbol) {
var widget = new TradingView.widget(
{
  "autosize": true,
  "symbol": symbol,
  "interval": "45",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": false,
  "container_id": "tradingview_2cd9b"
}
);
}

//
const apiKey = 'f3edb5e008a66b87d918503a9e71e9fd';
const url = `https://api.exchangeratesapi.io/v1/latest?access_key=${apiKey}`;

function fetchExchangeRates() {
  const apiKey = '44026ec3f3129d347e21f184';
  const url = `https://v6.exchangerate-api.com/v6/${apiKey}/latest/USD`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const rates = data.conversion_rates;

      const usdToEur = rates.EUR;
      const usdToGbp = rates.GBP;
      const usdToChf = rates.CHF;
      const usdToRub = rates.RUB;
      const usdToAud = rates.AUD;
      const usdToCad = rates.CAD;
      const usdToJpy = rates.JPY;

      document.getElementById('eur').querySelector('.rate').textContent = `${(1 / usdToEur).toFixed(3)} EUR/USD`;
      document.getElementById('usd').querySelector('.rate').textContent = `1.00 USD/USD`;
      document.getElementById('gbp').querySelector('.rate').textContent = `${(1 / usdToGbp).toFixed(3)} GBP/USD`;
      document.getElementById('chf').querySelector('.rate').textContent = `${(1 / usdToChf).toFixed(3)} CHF/USD`;
      document.getElementById('rub').querySelector('.rate').textContent = `${(1 / usdToRub).toFixed(4)} RUB/USD`;
      document.getElementById('aud').querySelector('.rate').textContent = `${(1 / usdToAud).toFixed(3)} AUD/USD`;
      document.getElementById('cad').querySelector('.rate').textContent = `${(1 / usdToCad).toFixed(3)} CAD/USD`;
      document.getElementById('jpy').querySelector('.rate').textContent = `${(1 / usdToJpy).toFixed(4)} JPY/USD`;
   
    })
    .catch(error => {
      console.error('Error fetching exchange rates:', error);
    });
}

fetchExchangeRates();



