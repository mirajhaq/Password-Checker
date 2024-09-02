<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revcap | Password Checker</title>
    <link rel="icon" type="image/png" href="https://revcapweb.azurewebsites.net/wp-content/uploads/2020/12/favicon-32x32-1.png">
    <style>

        body { 
            font-family: Arial, sans-serif; 
            margin: 0;
        }
            
        .logo {
            display: block;
            margin: 0 auto;
	        width: 220px;
            height: 150px;
            background-image: url('https://media.licdn.com/dms/image/D4E0BAQEO3Rihho4xUA/company-logo_200_200/0/1695821621440/real_estate_venture_capital_management_llp_logo?e=2147483647&v=beta&t=94JGrbW-rgoDslnt4woG30s_g3GTc0QarPf0P-hB1kg');
            background-size: cover;
            background-position: center;
           
        }

        h4 {
            text-align: center;
        }

        .reminder {
            text-align: center;
            font-family:'Trebuchet MS';
            margin-top: -50px;
        }

        .tab { 
            cursor: pointer; 
            padding: 10px; 
            margin-right: 5px; 
            background-color: #ffffff; 
            display: inline-block; 
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .tab.active { 
            background-color: #6d77d1; 
        }
        
        .content { 
            display: none; 
            margin-top: 150px;
        }

        .content.active { 
            display: block;
        }

        .form-container {
            display: flex;
            background-color: #dae2f0;
            height: 40vh;
            align-items: center; /* Center children vertically */
            flex-direction: column; /* Stack children vertically */
            background-color: #f7f7f7;
            margin: 0 auto; /* Center the container itself */
            width: 100%;     
        }
        
        input[type="password"], input[type="file"], button {
            width: 100;
            padding: 10px;
            margin-top: 10px;
            border: 2px solid #ddd;
            border-radius: 4px;
        }

        #result {
            margin-bottom: 100px; 

        }

        table { 
            width: 70%; 
            margin-top: 60px;
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse; 
        }

        .breach-check {
            border: 2px 
        }

        /* Style for the first column in the normal results table */
        .normal-first-col {
            font-weight: bold;
            background-color: #f0f0f0;
        }

        /* Style for the first column in the breached results table */
        .breached-first-col {
            font-weight: bold;
            background-color: #f0f0f0;
        }
        

        
        th, td { 
            border: 1px solid #ddd; 
            padding: 8px; text-align: left; 
        }
        th { 
            background-color: #f2f2f2; 
        }

        .stats {
            display: block;
            margin-top: 20px; 
            margin-left: auto;
            margin-right: auto;
            text-align: center; /* Center content inside the stats div */
            color: #000000;
            font-size: 17px;
            
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #262626;
        }

        .filename-style {
            font-weight: bold; 
            color: #090e13; 
            font-style: italic; 
        }

        .breached-style {
            font-weight: bold; /* Makes the filename bold */
            color: #ce0404; /* Sets the color to a blue */
        }

        .dupe-style {
            font-weight: bold;
            color: #6e3c02; /* Sets the color to a blue */

        }

        .button-container {
            display: none;
            justify-content: flex-start; 
            gap: 10px; 
        }

        #downloadCSV {
            margin-top: 20px;
            padding: 10px;
            background: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #downloadCSV.active {
	        background-color: #89e995ec; 		
        }

        #filterBreached {
            margin-top: 20px;
            padding: 10px;
            background: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #filterBreached.active {
	        background-color: #807fcaec;
        }

        #checkDuplicates {
            margin-top: 20px;
            padding: 10px;
            background: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #checkDuplicates.active {
	        background-color: #b97d7dec; 
        }

        #saveStats {
            margin-top: 20px;
            padding: 10px;
            background: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #eee;
        }

        #saveStats.active {
	        background-color: #ccc; 
        }

        #saveStats.disabled {
            background-color: #ccc; /* Grey out the button */
            cursor: not-allowed; /* Change cursor to indicate it's disabled */
            pointer-events: none; /* Prevents click events */
        }

        .table-load {
            display: block;
            text-align: center;
            color: #121212;
        }

        .stats-load {
            display: block;		
            text-align: center;
            color: #121212;
        }

        span[class^="dot-"]{
	        opacity: 0;
        }
        .dot-one{
	        font-size: 26px;
	        animation: dot-one 2s infinite linear
        }
        .dot-two{
	        font-size: 26px;
	        animation: dot-two 2s infinite linear
        }
        .dot-three{
	        font-size: 26px;
	        animation: dot-three 2s infinite linear
        }
        
  
        @keyframes dot-one {
	    0%{
	        opacity: 0;
	    }
	    15%{
	        opacity: 0;
	    }
	    25%{
	        opacity: 1;
	    }
	    100%{
	        opacity: 1;
	    }

        }
  
        @keyframes dot-two{
	    0%{
	        opacity: 0;
	    }
	    25%{
	        opacity: 0;
	    }
	    50%{
	        opacity: 1;
	    }
	    100%{
	    opacity: 1;
	    }
    }
  
        @keyframes dot-three{
	    0%{
	        opacity: 0;
	    }
	    50%{
	        opacity: 0;
	    }
	    75%{
	        opacity: 1;
	    }
	    100%{
	    opacity: 1;
	    }
    }

        
        
    </style>
</head>
<body>

<!--Revcap Logo -->
<div class="logo"> </div>

<div class="tab" onclick="changeTab(event, 'singleCheck')">Single Password Check</div>
<div class="tab" onclick="changeTab(event, 'csvCheck')">CSV Checker</div>

<div class="form-container">

<!--Single Password Form -->
<div id="singleCheck" class="content">
    <form method="POST" onsubmit="return checkPassword()">
    <p class=reminder>Type a password to see if it has been breached</p>
        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Check Password</button>
    </form>
</div>

<!--CSV Form -->
<div id="csvCheck" class="content">
    <form method="POST" onsubmit="return checkCSV(event)" enctype="multipart/form-data">
    <p class=reminder>Reminder: Make sure to delete your KeePass CSV once done</p>
        <label for="passwordFile">Upload CSV File:</label>
        <input type="file" id="passwordFile" name="passwordFile" accept=".csv" required>
        <button type="submit">Check CSV</button>
    </form>
</div>

<!-- Save Stats Message Area -->
<div id="saveStatsMessage" style="text-align: center; margin-top: 20px;"></div>

</div>


<!--Button Container -->
<div class= "button-container">
        
    <!-- Filter Breached Only Button -->
    <button id="filterBreached" onclick="filterBreached()"> Filter Breached Only</button>

    <!-- Check Duplicates Button -->
    <button id="checkDuplicates" onclick="groupDupe()"> Check for Duplicates</button>

    <button id="saveStats" onclick="saveStats()">Save Stats
        <img src="https://cdn-icons-png.flaticon.com/128/8243/8243060.png" alt="CSV Icon" style="width:15px; height:15px;"> 
    </button>

    <!-- Download CSV Button -->
	<button id="downloadCSV" onclick="downloadCSV()">Download Results as CSV
		<img src="https://cdn-icons-png.flaticon.com/512/8242/8242984.png" alt="CSV Icon" style="width:15px; height:15px;">
	</button>

</div>

<!-- Stats Section -->
<div class="stats" id="stats"></div>

<img id="crownImage" src="https://cdn-icons-png.flaticon.com/128/7359/7359212.png" alt="Crown" style="display: none; position: absolute;" />

<!-- Loading Stats -->
<div id="statsLoadingMessage" class="stats-load" style="display: none;">Loading stats
<span class="dot-one"> .</span>
<span class="dot-two"> .</span>
<span class="dot-three"> .</span>
</div>



<!-- Loading Table -->
<div id="tableLoadingMessage" class="table-load" style="display: none;">Loading table
<span class="dot-one"> .</span>
<span class="dot-two"> .</span>
<span class="dot-three"> .</span>

</div>


<!-- Results Section -->
<div id="result"></div>





<!--JAVASCRIPT -->
<script>

// Tab Change
    function changeTab(evt, tabName) {
        resetResults();
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tab");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    // Display the first tab by default
    document.getElementsByClassName("tab")[0].click();



// Single Check Function
        function checkPassword() {
            var password = document.getElementById('password').value;                                 
            
            if (password.trim() === '') {                                                             
                alert('No Password entered.');                                                       
                return false;                                                                         
            }

            var xhr = new XMLHttpRequest();                                                                                               
            xhr.open('POST', 'singleCheck.php', true);                                                 
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');                 
            xhr.onload = function() {                                                                                                 
                document.getElementById('result').innerHTML = xhr.responseText;                                          
                document.getElementById('password').value = '';                                      
            };  
            xhr.send('password=' + encodeURIComponent(password));                                   
            return false;                                                                            
            
        }

// CSV Check Function

        var breachedResults = '';
        var fullTableHTML = '';
        var dupeResults = '';
        var statMessage = '';

        var isBreachedDisplayed = false;
        var isDupedDisplayed = false;

        function checkCSV(event) {
            event.preventDefault(); // Prevent the default form submission
            untoggleButtons();
            resetResults();
            
            // Show loading messages
            document.getElementById('tableLoadingMessage').style.display = 'block';
            document.getElementById('statsLoadingMessage').style.display = 'block';
            document.getElementById('downloadCSV').style.display = 'none';

            var formData = new FormData();
            var fileInput = document.getElementById('passwordFile');
            if(fileInput.files.length === 0) {
                alert('No file selected.');
                return false;
            }
            formData.append('passwordFile', fileInput.files[0]);

            fetch('csvCheck.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                fullTableHTML = data;
                document.getElementById('result').innerHTML = fullTableHTML;
                document.querySelector('.button-container').style.display = 'flex'; // Correctly place to show the buttons
                fileInput.value = ''; // Reset the file input
                fetchBreachedResults(formData);
                fetchDupeResults(formData);

                document.getElementById('tableLoadingMessage').style.display = 'none';
                

                fetch('stats.php', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json()) // Process JSON response
                .then(stats => {
                    document.getElementById('stats').innerHTML =
                        '<div>CSV File Name: <span class="filename-style">' + stats.fileName + '</span></div>' +                    
                        '<div>Total Passwords: <span>' + stats.totalPasswords + '</span></div>' +
                        '<div>Total Breached Passwords: <span class="breached-style">' + stats.breachedCount + '</span></div>' +
                        '<div>Breached Percentage: <span>' + stats.breachedPercentage + '%</span></div>' +
                        '<div>Duplicate passwords: <span class="dupe-style">' + stats.duplicateGroups + '</span></div>' ;
                        
                    document.getElementById('statsLoadingMessage').style.display = 'none';
                })

                .catch(error => {
                console.error('Error fetching stats:', error);
                document.getElementById('statsLoadingMessage').style.display = 'none';
                });
            })


            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                document.getElementById('tableLoadingMessage').style.display = 'none';
            });

            return false;
        }

// stats.php call to get results
        function fetchStatsResults(formdata) {
            fetch('stats.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                statsResults = data;
            })
            .catch(error => console.error('Error fetching stats:', error));
        }

// breachedCheck.php Call to get results
        function fetchBreachedResults(formData) {
            fetch('breachedCheck.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                breachedResults = data; // Store breached results for later use
            })
            .catch(error => console.error('Error fetching breached results:', error));
        }

// dupeCheck.php call to get results
        function fetchDupeResults(formData) {
            fetch('dupeCheck.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(data => {
                dupeResults = data;
            })
            .catch(error => console.error('Error fetching duplicate results:', error));
        }

// Function to switch results to breached HTML output
        function filterBreached() {
            var filterButton = document.getElementById('filterBreached'); // Get the filter button
            var dupeButton = document.getElementById('checkDuplicates');
            document.getElementById('downloadCSV').style.display = 'block';

            if (isBreachedDisplayed) {
                document.getElementById('result').innerHTML = fullTableHTML;
                isBreachedDisplayed = false;
                filterButton.classList.remove('active');
                document.getElementById('downloadCSV').style.display = 'none';
            } else {
                document.getElementById('result').innerHTML = breachedResults;
                isBreachedDisplayed = true;
                filterButton.classList.add('active');
                isDupedDisplayed = false;
                dupeButton.classList.remove('active');
            }
        }

// Function to switch results to duplicate HTML output
        function groupDupe() {
            var dupeButton = document.getElementById('checkDuplicates');
            var filterButton = document.getElementById('filterBreached');
            document.getElementById('downloadCSV').style.display = 'block';

            if (isDupedDisplayed) {
                document.getElementById('result').innerHTML = fullTableHTML;
                isDupedDisplayed = false;
                dupeButton.classList.remove('active');
                document.getElementById('downloadCSV').style.display = 'none';
            } else {
                document.getElementById('result').innerHTML = dupeResults;
                isDupedDisplayed = true;
                dupeButton.classList.add('active');
                isBreachedDisplayed = false;
                filterButton.classList.remove('active');
            }
        }

// Untoggle buttons when uploading another CSV
        function untoggleButtons() {
            var buttons = ['filterBreached', 'checkDuplicates'];
            buttons.forEach(function(buttonId) {
                var button = document.getElementById(buttonId);
                button.classList.remove('active');
            });
        }


// Reset Results div
        function resetResults() {
            document.getElementById('result').innerHTML = '';
            document.querySelector('.button-container').style.display = 'none'; // Hide the buttons
            document.getElementById('stats').innerHTML = '';

            var saveStatsButton = document.getElementById('saveStats');
            saveStatsButton.classList.remove('disabled');
        }

        
// Download CSV

function downloadCSV() {
    var downloadButton = document.getElementById('downloadCSV');
    downloadButton.classList.add('active');

    setTimeout(function() {
        downloadButton.classList.remove('active');                                              
    }, 120);

   
    var tables = document.getElementById('result').getElementsByTagName('table');
    if (tables.length === 0) {
        alert("Nothing to download.");
        return;
    }
    var csv = [];

    // Iterate over each table
    for (var t = 0; t < tables.length; t++) {
        var rows = tables[t].querySelectorAll("tr");

        // Iterate over each row in the table
        for (var i = 0; i < rows.length; i++) {
            var row = [], cols = rows[i].querySelectorAll("td, th");

            // Iterate over each column in the row
            for (var j = 0; j < cols.length; j++) {
                // Clean the text, enclose in quotes, and escape existing double quotes
                var text = cols[j].innerText.replace(/"/g, '""');
                row.push('"' + text + '"');
            }
            // Join each row's columns and push into the csv array
            csv.push(row.join(","));
        }
        // Optionally, add a new line between tables
        if (t < tables.length - 1) csv.push("\n");
    }

    downloadCSVFile(csv.join("\n"));
}

function downloadCSVFile(csv) {
    var csvFile;
    var downloadLink;
    var fileName = 'results.csv'; // Default file name
    var today = new Date();
    var dateStr = today.getFullYear() + "-" + (today.getMonth() + 1).toString().padStart(2, '0') + "-" + today.getDate().toString().padStart(2, '0');
    
    // Check which type of results are currently displayed and adjust the file name accordingly
    if (isBreachedDisplayed) {
        fileName = 'breached_results.csv';
    } else if (isDupedDisplayed) {
        fileName = 'duplicate_results.csv';
    }

    fileName += "_" + dateStr + ".csv";
    
    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});
    
    // Download link
    downloadLink = document.createElement("a");
    
    // File name
    downloadLink.download = fileName;
    
    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);
    
    // Hide download link
    downloadLink.style.display = "none";
    
    // Add the link to DOM
    document.body.appendChild(downloadLink);
    
    // Click download link
    downloadLink.click();
}

function saveStats() {
    var statsButton = document.getElementById('saveStats');
    statsButton.classList.add('active');

    const userName = prompt("Enter your name:", "");
    if (userName === null) {
        // User clicked cancel, immediately remove 'active' and do not disable the button.
        statsButton.classList.remove('active');
        return; // Exit the function if cancel is clicked
    } else if (userName.trim() === "") {
        alert("You must enter a name to save the stats.");
        statsButton.classList.remove('active'); // Remove 'active' class since no name is entered
        // Do not disable the button here since the user might want to try again
        return; // Exit the function if no name is provided
    }

    // Disable the button only after validating the input
    setTimeout(function() {
        statsButton.classList.remove('active');                                              
    }, 500);


    const stats = document.getElementById('stats').innerText;
    const formData = new FormData();
    formData.append('stats', stats);
    formData.append('userName', userName.trim());

    fetch('saveStats.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        // Update the dedicated message area with the response
        document.getElementById('saveStatsMessage').innerHTML = data;
        // Optionally, clear the message after a delay
        setTimeout(() => {
            document.getElementById('saveStatsMessage').innerHTML = '';
        }, 8000); 

    })
    
    .catch(error => {
        console.error('Error:', error);
        // Show error message
        document.getElementById('saveStatsMessage').innerHTML = 'Error saving stats';
    });
}

      

</script>

</body>
</html>
