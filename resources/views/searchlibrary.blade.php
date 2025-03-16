<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Library</title>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: Lexend, sans-serif;
      overflow: hidden;
      position: relative;
      opacity: 0;
      animation: fadeIn 1.5s ease-in-out forwards;
      font-size: 18px; /* Increased font size for the body */
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .top-bar {
      width: 100%;
      height: 140px;
      background-color: #F0F0F0;
      color: black;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 24px;
      position: relative;
      border-bottom: 3px solid black;
    }

    .top-bar-left {
      display: flex;
      align-items: center;
    }

    .profile-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 12px;
    }

    .top-bar-left span {
      font-size: 22px; /* Increased font size for the name */
      font-weight: bold;
    }

    .politeknik-logo {
      position: absolute;
      top: -8px;
      right: 24px;
      max-width: 200px;
      height: auto;
      object-fit: contain;
    }

    .container {
      display: flex;
      height: calc(100vh - 140px);
      background-color: transparent;
    }

    .sidebar {
      width: 250px;
      background-color: #F0F0F0;
      color: black;
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100%;
      border-right: 3px solid black;
    }

    .sidebar button {
      background: transparent;
      border: 2px solid #BDC3C7;
      color: black;
      font-size: 20px; /* Increased font size for buttons */
      padding: 18px;
      text-align: left;
      width: 100%;
      margin-bottom: 10px;
      cursor: pointer;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .sidebar button:hover {
      background-color: #D3D3D3;
      border-color: #A9A9A9;
      color: #333;
    }

    .main-content {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      padding: 20px;
      background-image: url('images/HomeBack.png');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .main-title {
      font-size: 38px; /* Increased font size for the main title */
      font-weight: bold;
      text-align: center;
      padding: 10px 0;
      border-bottom: 5px solid black;
    }

    .dropdown-container {
      margin-top: 15px;
      text-align: center;
    }

    .dropdown-label {
      font-size: 24px; /* Increased font size for dropdown label */
      font-weight: bold;
      display: block;
      margin-bottom: 10px;
    }

    .dropdown {
      width: 60%;
      padding: 12px; /* Increased padding for dropdown */
      font-size: 20px; /* Increased font size for dropdown */
      border: 2px solid black;
      border-radius: 5px;
      background-color: white;
      cursor: pointer;
    }

    .module-content {
      width: 100%;
      max-height: 600px;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      font-size: 16px; /* Increased font size for module content */
      font-weight: 400;
      color: black;
      text-align: left;
      border-radius: 5px;
      margin-top: 20px;
      padding: 15px;
      overflow-y: auto;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      line-height: 1.8; /* Increased line height */
    }

    .right-section {
      width: 28%;
      display: flex;
      flex-direction: column;
      gap: 20px;
      padding-left: 20px;
      margin-left: auto;
    }

    .notification-box, .calendar-box {
      width: 100%;
      background: rgba(217, 217, 217, 0.8);
      outline: 1px black solid;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 22px; /* Increased font size for notification and calendar box */
      font-weight: 400;
      color: black;
      height: 50%;
    }

    .bottom-logo {
      margin-top: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px 0;
    }

    .bottom-logo img {
      width: 200px;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="top-bar">
    <div class="top-bar-left">
      <img src="images/FINN.png" alt="Profile Picture" class="profile-img"/>
      <span>Ampuan Muhammad Abdul Matin Bin Ampuan Shahmali</span>
    </div>
  </div>

  <img src="images/Poli.png" alt="Politeknik Logo" class="politeknik-logo"/>

  <div class="container">
    <div class="sidebar">
      <div>
        <a href="{{ route('home') }}"><button>Homepage</button></a>
        <a href="{{ route('profile') }}"><button>Profile</button></a>
        <a href="{{ route('message') }}"><button>Message</button></a>
        <a href="{{ route('account') }}"><button>Account</button></a>
        <a href="{{ route('reportfeedback') }}"><button>Report & Feedbacks</button></a>
        <a href="{{ route('aboutus') }}"><button>About Us</button></a>
        <a href="{{ route('login') }}"><button>Log Out</button></a>
      </div>
      <div class="bottom-logo">
        <img src="images/Logo.png" alt="SkillKit Logo"/>
      </div>
    </div>

    <div class="main-content">
      <div class="main-title">Search Library</div>

      <div class="dropdown-container">
        <label class="dropdown-label" for="module-select">Choose a Module:</label>
        <select id="module-select" class="dropdown" onchange="updateModule()">
          <option value="">-- Select a module --</option>
          <option value="module1">Introduction to Library System</option>
          <option value="module2">Advanced Search Techniques</option>
          <option value="module3">Digital Library Access</option>
          <option value="module4">Citation and Referencing</option>
        </select>
      </div>

      <div id="module-content" class="module-content">
        Please select a module from the dropdown.
      </div>
    </div>
  </div>

  <script>
    function updateModule() {
      const selectedModule = document.getElementById("module-select").value;
      const contentDiv = document.getElementById("module-content");
      
      const moduleData = {
        module1: `
        <b>Introduction to Library System</b><br><br>
        Libraries are vital resources that provide access to books, journals, and digital content.<br>
        Knowing how to navigate a library is essential for effective research.<br>
        A well-organized library allows users to find relevant information quickly and easily.<br><br>

        <b>Types of Libraries:</b><br>
        <ul>
          <li><b>Public Libraries:</b> Open to everyone, usually free of charge. Offer books, movies, computers, and sometimes internet.</li>
          <li><b>Academic Libraries:</b> Found in universities, these provide resources for academic research.</li>
          <li><b>Special Libraries:</b> Focus on specific fields, such as law or medicine, often with rare resources.</li>
          <li><b>Digital Libraries:</b> Online repositories for e-books, academic papers, multimedia, and more. Provide global access.</li>
        </ul>
        
        <b>Library Services:</b><br>
        Borrowing books, using reference sections, digital content access, research assistance, and access to online databases.<br>
        <b>Library Layout:</b><br>
        Cataloging systems (e.g., Dewey Decimal, Library of Congress), reference sections, study areas, and digital resources.<br>
        `,
        module2: `
        <b>Advanced Search Techniques</b><br><br>
        <b>Understanding Search Engines:</b> Search engines help locate relevant resources efficiently.<br>
        <b>Boolean Operators:</b> Use operators like AND, OR, and NOT to refine search results.<br>
        <b>Wildcards and Truncation:</b> Symbols like '*' or '?' expand search results.<br>
        <b>Advanced Search Filters:</b> Filter by date, type, etc., in most search engines.<br>
        <b>Using Keywords Effectively:</b> Focus on specific terms for better results.<br>
        `,
        module3: `
        <b>Digital Library Access</b><br><br>
        <b>What is a Digital Library?</b> It provides electronic access to books, articles, and multimedia.<br>
        <b>Accessing Digital Libraries:</b> Online portals provide access to digital collections.<br>
        <b>Online Databases:</b> Platforms like JSTOR, PubMed, and Google Scholar offer vast resources.<br>
        <b>Benefits:</b> 24/7 access from anywhere, searching large datasets, and various digital formats like PDF, EPUB, and HTML.<br>
        `,
        module4: `
        <b>Citation and Referencing</b><br><br>
        <b>Why is Citation Important?</b> It ensures academic integrity by allowing readers to trace sources.<br>
        <b>Common Citation Styles:</b> APA (social sciences), MLA (humanities), Chicago (history and others).<br>
        <b>How to Cite:</b> Include author, title, publisher, year, and page number where applicable.<br>
        <b>Reference Management Tools:</b> Use tools like Zotero and EndNote to manage citations.<br>
        `
      };

      contentDiv.innerHTML = moduleData[selectedModule] || "Content not available.";
    }
  </script>
</body>
</html>
