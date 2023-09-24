var selectSymbol = document.getElementById("symbol");

// Add an event listener for changes in the selected option
selectSymbol.addEventListener("change", async function () {
    // Get the selected symbol value
    var selectedSymbol = selectSymbol.value;

    // Set up the API endpoint URL
    var endpoint = "https://www.alphavantage.co/query";

    // Set up the query parameters
    var params = new URLSearchParams();
    params.append("function", "CURRENCY_EXCHANGE_RATE");
    params.append("from_currency", selectedSymbol.substring(0, 3));
    params.append("to_currency", selectedSymbol.substring(4, 7));
    params.append("apikey", "M4QY5D98C0W2G5BB"); // Replace with your AlphaVantage API key

    try {
        // Make the fetch request
        var response = await fetch(endpoint + "?" + params.toString());
        var data = await response.json();

        // Extract the exchange rate from the response
        if (data['Information']) {
            var exchangeRate = 'NO PRICE';
        } else {
            var exchangeRate =  Number(data['Realtime Currency Exchange Rate']['5. Exchange Rate']);
        }
        
        // Calculate take_profit and stop_loss values (20% higher and 20% lower than the current price)
        var currentPrice = exchangeRate;
        var takeProfit = (currentPrice * 1.20).toFixed(4); // 20% higher
        var stopLoss = (currentPrice * 0.80).toFixed(4);   // 20% lower

        // Update the value of the price input field
        var currentPriceInput = document.getElementById("current-price");
        currentPriceInput.value = currentPrice;

        // Update the value of the take_profit and stop_loss input fields
        var takeProfitInput = document.getElementById("take_profit");
        var stopLossInput = document.getElementById("stop_loss");
        takeProfitInput.value = takeProfit;
        stopLossInput.value = stopLoss;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});


document.addEventListener('DOMContentLoaded',async ()=>{
    var endpoint = "https://www.alphavantage.co/query";

    // Set up the query parameters
    var params = new URLSearchParams();
    params.append("function", "CURRENCY_EXCHANGE_RATE");
    params.append("from_currency",'ALL');
    params.append("to_currency",'USD');
    params.append("apikey", "M4QY5D98C0W2G5BB"); // Replace with your AlphaVantage API key
  
        // Make the fetch request
        var response = await fetch(endpoint + "?" + params.toString());
        var data = await response.json();
        
        // Extract the exchange rate from the response
        if (data['Information']) {
            var exchangeRate = 'NO PRICE';
        } else {
            var exchangeRate =  Number(data['Realtime Currency Exchange Rate']['5. Exchange Rate']);
        }
        
        // Calculate take_profit and stop_loss values (20% higher and 20% lower than the current price)
        var currentPrice = exchangeRate;
        var takeProfit = (currentPrice * 1.20).toFixed(2); // Limit to 2 decimal places
        var stopLoss = (currentPrice * 0.80).toFixed(2); 
        // Update the value of the price input field
        var currentPriceInput = document.getElementById("current-price");
        currentPriceInput.value = currentPrice;

        // Update the value of the take_profit and stop_loss input fields
        var takeProfitInput = document.getElementById("take_profit");
        var stopLossInput = document.getElementById("stop_loss");
        takeProfitInput.value = takeProfit;
        stopLossInput.value = stopLoss;
    
    // } catch (error) {
    //     console.error("Error fetching data:", error);
    // }

});
