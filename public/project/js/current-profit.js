document.addEventListener('DOMContentLoaded', () => {
    const spans = document.querySelectorAll('[data-trade-id]');

    spans.forEach(async (span) => {
        const tradeId = span.getAttribute('data-trade-id');
        // Now you have the `tradeId`, and you can use it in your fetch request
       await fetch('/trade-info/' + tradeId)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data, update the corresponding span element
                span.textContent = 'Current profit: ' + data;
            })
            .catch(error => {
                console.error('Error fetching trade info: ' + error);
            });
    });
});



  async function fetchProfit(tradeId) {
    try {
        const response = await fetch('/trade-info/' + tradeId);
        const data = await response.json();
        
        // Handle the response data, update the corresponding span element
        const span = document.querySelector(`[data-trade-id='${tradeId}']`);
        span.textContent = 'Current profit: ' + data; // Update the content as needed
    } catch (error) {
        console.error('Error fetching trade info: ' + error);
    }
}