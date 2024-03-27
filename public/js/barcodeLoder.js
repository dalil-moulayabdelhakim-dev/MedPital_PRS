// Get a reference to the HTML element for rendering the barcode


// Function to generate and display the barcode
function generateBarcode() {
    const barcodeOutput = document.getElementById('barcode-output');

    const code = barcodeOutput.getAttribute('data-code');
    // Predefined order code



    // Generate the barcode and render it in the specified element
    JsBarcode("#barcode", code, {
          "format": "CODE128",
          "background": "rgba(255, 255, 255, 0)",
          "lineColor": "#000000",
          "width": "4",
          "font": "sans-serif",
          "height": "100",
          "fontOption": "bold".ge,
          "fontSize": "30",
          "displayValue": false,

    });
}

// Automatically generate the barcode when the page loads
window.addEventListener('load', generateBarcode);
