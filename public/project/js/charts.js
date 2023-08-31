
document.addEventListener('DOMContentLoaded',function(){
    
    new TradingView.widget(
        {
        "autosize": true,
        "symbol": "BITSTAMP:BTCUSD",
        "interval": "D",
        "timezone": "Etc/UTC",
        "theme": "dark",
        "style": "1",
        "locale": "en",
        "toolbar_bg": "#f1f3f6",
        "enable_publishing": false,
        "allow_symbol_change": true,
        "container_id": "tradingview_f644a"
      }
        );
});

function changeTrSymbol(symbol) {
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
  "container_id": "tradingview_f644a"
}
);
}



