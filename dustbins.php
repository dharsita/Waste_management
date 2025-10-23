<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Click to Zoom Image</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    .image-container {
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
      cursor: zoom-in;
      transition: transform 0.4s ease;
    }

    .image-container.zoomed {
      transform: scale(2);
      cursor: zoom-out;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
      transition: transform 0.4s ease;
    }
  </style>
</head>
<body>


  <div class="image-container" id="zoomContainer">
    <img src="giet.jpg" alt="Dustbin Image">
  </div>

  <script>
    const container = document.getElementById("zoomContainer");

    container.addEventListener("click", () => {
      container.classList.toggle("zoomed");
    });
  </script>

</body>
</html>
