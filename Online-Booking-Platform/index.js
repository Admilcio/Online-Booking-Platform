function setAlert(){
  window.onload = setTimeout(function(){
   alert("Welcome to the website!!");
  }, 5000);
}

$(document).ready(function() {
/* Side Content */
$("#toggleSlide").click(function() {
  var slideContent = $(".side-content");
  var currentPosition = parseInt(slideContent.css("right"));
  $("#toggleSlide").hide();
  if (currentPosition === 0) {
    slideContent.css("right", "-300px"); // Slide out
  } else {
    slideContent.css("right", "0"); // Slide in
  }
});
$("#close").click(function() {
  var slideContent = $(".side-content");
  var currentPosition = parseInt(slideContent.css("right"));
  $("#toggleSlide").show();
  if (currentPosition === 0) {
    slideContent.css("right", "-300px"); // Slide out
  } else {
    slideContent.css("right", "0"); // Slide in
  }
});
/* RSS Fetch */
const news = $("#news");

$.ajax({
  url:  "https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml",
  method: "GET",
  dataType: "xml",
  success: function(xmlData) {
    parseAndDisplayNews(xmlData, news);
  },
  error: function() {
    newsContainer.html("Error loading news.");
  }
});

/* Budget Pricing */
  let basePrice = 1000;
  let selectedBudgetValue = "Basic"; // Default budget value
 
  function updatePriceDisplay() {
    let totalPrice = basePrice;
    if (selectedBudgetValue === "Standard") {
      totalPrice += 300;
    } else if (selectedBudgetValue === "Premium") {
      totalPrice += 500;
    }
    const numOfMonth = $("#select-month").val();
    switch(numOfMonth){
      case "":
        totalPrice += 0;
        break;
      case "1":
        totalPrice -= (0.05 * totalPrice);
        break;
      case "2":
        totalPrice -= (0.10 * totalPrice);
        break;
      case "3":
        totalPrice -= (0.15 * totalPrice);
        break;
      default:
        totalPrice -= (0.20 * totalPrice);
    }
    const selectedValues = $("input[type='checkbox']:checked").map(function() {
      return parseInt(this.value);
    }).get();

    totalPrice += selectedValues.reduce((total, value) => total + value, 0);

    $(".final-price").val("$" + totalPrice);

  }

  $("#select-budget").change(function() {
    selectedBudgetValue = $(this).val();
    updatePriceDisplay();
  });

  $("#sep-form").change(updatePriceDisplay);
  
  $("#select-month").change(updatePriceDisplay)

/* Json DATA */
$("#load-json").on("click", function(){
  $("#remind-description").hide(50);
  $(".json-btn").show();
  function fetchData() {
    $.getJSON('data.json', function(dataArray) {
      const dataContainer = $('.json-data');

      // Loop through the array of objects and create HTML for each item
      let html = '';
      dataArray.forEach(function(item) {
        html += `
          <div class="json-item">
            <h5>${item.title}</h5>
            <p>${item.description}</p>
          </div>
        `;
      });

      dataContainer.html(html); // Update the HTML container with all items
    })
    .fail(function(jqxhr, textStatus, error) {
      console.error('Error fetching data:', error);
    });
  }
  // Call the fetchData function to initiate the AJAX request
  fetchData();
});

$(".btn-json").on("click", function() {
  // Redirect to the desired URL when the button is clicked
  window.location.href = "budget.php";
});
$(".show-form").on("click", function(){
  $(".hide-form").toggle();
})
$(".show-news").on("click", function(){
  $(".display-news").toggle();
})
  // Add a submit event handler to the form
  $('#myform-1').submit(function(e) {
    e.preventDefault(); // Prevent the default form submission

    // Get the selected date and message
    var newDate = $('#date').val();

    // Make an AJAX request to update the date on the server
    $.ajax({
      type: 'POST',
      url: 'update_date.php', // Replace with the actual URL to your server-side script
      data: {
        date: newDate
      },
      success: function(response) {
        // Handle the response from the server (e.g., show a success message)
        alert('Date updated successfully');
      },
      error: function(xhr, status, error) {
        // Handle errors if the AJAX request fails
        alert('Error updating date: ' + error);
      }
    });
  });

});
  // Reset input fields
  $("#myform")[0].reset();

/* RSS Parse Xml data function */
function parseAndDisplayNews(xmlData, container) {
  const items = $(xmlData).find("item");

  let newsHTML = "";
  items.each(function() {
    const title = $(this).find("title").text();
    const link = $(this).find("link").text();
    const description = $(this).find("description").text();

    newsHTML += `
      <div class="news-item">
        <h2><a href="${link}" target="_blank">${title}</a></h2>
        <p>${description}</p>
      </div>
    `;
  });

  container.html(newsHTML);
}
/* Conform if the user wants to delete the purchase */
function confirmDelete(purchase_id) {
  if (confirm("Are you sure you want to delete this purchase?")) {
      window.location.href = "delete_purchase.php?purchase_id=" + purchase_id;
  }
}

