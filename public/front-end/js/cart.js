$(document).ready(function() {
  var totalCost = document.getElementById('vnd_to_usd').value;
  paypal.Button.render({
      // Configure environment
      env: 'sandbox',
      client: {
          sandbox: 'AeRp7Afqa-rfLMVHrUPL8-aMcfmKLt8EAArheOUkMwFyLuf3sALgxG7K3WhJ-fy_aZanCTeU-BBQQEG0',
          production: 'demo_production_client_id'
      },
      // Customize button (optional)
      locale: 'en_US',
      style: {
          size: 'small',
          color: 'gold',
          shape: 'pill',
      },

      // Enable Pay Now checkout flow (optional)
      commit: true,

      // Set up a payment
      payment: function(data, actions) {
          return actions.payment.create({
              transactions: [{
                  amount: {
                      total: `${totalCost}`,
                      currency: 'USD'
                  }
              }]
          });
      },
      // Execute the payment
      onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
              // Show a confirmation message to the buyer
              window.alert('Thank you for your purchase!');
          });
      }
  }, '#paypal-button');



  $('#payment').on('change', function(e) {
      e.preventDefault();
      var paymentId = $('#payment option').filter(':selected').val();
      if(paymentId == 2) {
          $('#paypal-button').css("display", "block");
      } else {
          $('#paypal-button').css("display", "none");
      }
  })
})