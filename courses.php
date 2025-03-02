<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses Dashboard</title>
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f7fa;
      overflow: hidden; /* Prevent body scroll, but allow dashboard scroll */
      position: relative;
    }

    /* Background Animation Styles */
    #background-canvas {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1; /* Ensure the canvas stays behind the content */
    }

    /* Header Styles */
    header {
      background-color: #000080;
      color: white;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 24px;
    }

    nav {
      display: flex;
      gap: 20px;
      padding-right: 100px;
    }

    nav a {
      color: white;
      text-decoration: none;
      font-size: 16px;
    }

    /* Dashboard Styles */
    .dashboard {
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 cards per row */
      gap: 30px; /* Increased gap between cards */
      padding: 30px; /* Increased padding around the grid */
      max-height: calc(100vh - 150px); /* Ensure the dashboard fits within the viewport */
      overflow-y: auto; /* Make it scrollable */
    }

    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
      min-height: 250px; /* Increased card height */
      margin: 10px; /* Increased margin around each card */
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
      font-size: 20px;
      margin: 0;
    }

    .card p {
      font-size: 14px;
      color: #555;
    }

    .card .btn {
      margin-top: 10px;
      padding: 10px 20px;
      background-color: #000080;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .card .btn:hover {
      background-color: #16a01de9;
    }

    .card img {
      width: 100%;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .card a {
      text-decoration: none;
    }

    /* Responsive Layout */
    @media (max-width: 1024px) {
      .dashboard {
        grid-template-columns: repeat(2, 1fr); /* 2 cards per row on medium screens */
      }
    }

    @media (max-width: 768px) {
      .dashboard {
        grid-template-columns: 1fr; /* 1 card per row on small screens */
      }
    }

    /* Footer Styles */
    footer {
      background-color: #000080;
      color: white;
      padding: 10px;
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <!-- Background Animation Canvas -->
  <canvas id="background-canvas"></canvas>

  <header>
    <h1>Courses Dashboard</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="courses.php">Courses</a>
      <a href="view.php">Notes & Question Papers</a>
    </nav>
  </header>

  <div class="dashboard">
    <!-- Cards -->
    <div class="card">
      <img src="https://img.youtube.com/vi/HcOc7P5BMi4/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 1</h3>
      <p>Watch this helpful video for more insights.</p>
      <a href="https://youtu.be/HcOc7P5BMi4?si=VM-j7EZg1NfvOOXc" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/ESnrn1kAD4E/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 2</h3>
      <p>Learn more with this detailed video.</p>
      <a href="https://youtu.be/ESnrn1kAD4E?si=imS1WMqqFO1GJsKz" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/Ez8F0nW6S-w/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 3</h3>
      <p>Explore this video for advanced concepts.</p>
      <a href="https://youtu.be/Ez8F0nW6S-w?si=JxV0pG-x_kpsfzqF" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/Ez8F0nW6S-w/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 4</h3>
      <p>Another great video to enhance your knowledge.</p>
      <a href="https://youtu.be/Ez8F0nW6S-w?si=NeGKODsQwfDLbQy5" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/ajdRvxDWH4w/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 5</h3>
      <p>Check out this video for practical examples.</p>
      <a href="https://youtu.be/ajdRvxDWH4w?si=y_9-cNcWuEH4ry3N" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/VTLCoHnyACE/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 6</h3>
      <p>Learn new skills with this video.</p>
      <a href="https://youtu.be/VTLCoHnyACE?si=LZpBqUTUNcdGZGl2" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/nGhKIC_7Mkk/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 7</h3>
      <p>Master the concepts with this video.</p>
      <a href="https://youtu.be/nGhKIC_7Mkk?si=YwvSGdCZmXZ6p-Di" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/P08Z_NC8GuY/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 8</h3>
      <p>Get insights from this informative video.</p>
      <a href="https://youtu.be/P08Z_NC8GuY?si=B93ins7jwyNipsEu" target="_blank" class="btn">Watch Video</a>
    </div>

    <div class="card">
      <img src="https://img.youtube.com/vi/LusTv0RlnSU/maxresdefault.jpg" alt="YouTube Video Thumbnail">
      <h3>YouTube Video 9</h3>
      <p>Get insights from this informative video.</p>
      <a href="https://youtu.be/LusTv0RlnSU?si=DVe4RmndGW-SBjS5" target="_blank" class="btn">Watch Video</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Notes & Question Paper Website. All Rights Reserved.</p>
  </footer>

  <!-- Background Animation Script -->
  <script>
    var canvas = document.getElementById('background-canvas');
    var width = canvas.width = window.innerWidth;
    var height = canvas.height = window.innerHeight;
    var gl = canvas.getContext('webgl');

    var mouse = { x: 0, y: 0 };

    var numMetaballs = 30;
    var metaballs = [];

    for (var i = 0; i < numMetaballs; i++) {
      var radius = Math.random() * 60 + 10;
      metaballs.push({
        x: Math.random() * (width - 2 * radius) + radius,
        y: Math.random() * (height - 2 * radius) + radius,
        vx: (Math.random() - 0.5) * 3,
        vy: (Math.random() - 0.5) * 3,
        r: radius * 0.75
      });
    }

    var vertexShaderSrc = `
      attribute vec2 position;
      void main() {
        gl_Position = vec4(position, 0.0, 1.0);
      }
    `;

    var fragmentShaderSrc = `
      precision highp float;
      const float WIDTH = ` + (width >> 0) + `.0;
      const float HEIGHT = ` + (height >> 0) + `.0;
      uniform vec3 metaballs[` + numMetaballs + `];
      void main(){
        float x = gl_FragCoord.x;
        float y = gl_FragCoord.y;
        float sum = 0.0;
        for (int i = 0; i < ` + numMetaballs + `; i++) {
          vec3 metaball = metaballs[i];
          float dx = metaball.x - x;
          float dy = metaball.y - y;
          float radius = metaball.z;
          sum += (radius * radius) / (dx * dx + dy * dy);
        }
        if (sum >= 0.99) {
          gl_FragColor = vec4(mix(vec3(x / WIDTH, y / HEIGHT, 1.0), vec3(0, 0, 0), max(0.0, 1.0 - (sum - 0.99) * 100.0)), 1.0);
          return;
        }
        // Set background color to white
        gl_FragColor = vec4(1.0, 1.0, 1.0, 1.0); // White background
      }
    `;

    var vertexShader = compileShader(vertexShaderSrc, gl.VERTEX_SHADER);
    var fragmentShader = compileShader(fragmentShaderSrc, gl.FRAGMENT_SHADER);

    var program = gl.createProgram();
    gl.attachShader(program, vertexShader);
    gl.attachShader(program, fragmentShader);
    gl.linkProgram(program);
    gl.useProgram(program);

    var vertexData = new Float32Array([
      -1.0,  1.0, // top left
      -1.0, -1.0, // bottom left
      1.0,  1.0, // top right
      1.0, -1.0, // bottom right
    ]);
    var vertexDataBuffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, vertexDataBuffer);
    gl.bufferData(gl.ARRAY_BUFFER, vertexData, gl.STATIC_DRAW);

    var positionHandle = getAttribLocation(program, 'position');
    gl.enableVertexAttribArray(positionHandle);
    gl.vertexAttribPointer(positionHandle, 2, gl.FLOAT, gl.FALSE, 2 * 4, 0);

    var metaballsHandle = getUniformLocation(program, 'metaballs');

    loop();
    function loop() {
      for (var i = 0; i < numMetaballs; i++) {
        var metaball = metaballs[i];
        metaball.x += metaball.vx;
        metaball.y += metaball.vy;

        if (metaball.x < metaball.r || metaball.x > width - metaball.r) metaball.vx *= -1;
        if (metaball.y < metaball.r || metaball.y > height - metaball.r) metaball.vy *= -1;
      }

      var dataToSendToGPU = new Float32Array(3 * numMetaballs);
      for (var i = 0; i < numMetaballs; i++) {
        var baseIndex = 3 * i;
        var mb = metaballs[i];
        dataToSendToGPU[baseIndex + 0] = mb.x;
        dataToSendToGPU[baseIndex + 1] = mb.y;
        dataToSendToGPU[baseIndex + 2] = mb.r;
      }
      gl.uniform3fv(metaballsHandle, dataToSendToGPU);

      // Draw
      gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);

      requestAnimationFrame(loop);
    }

    function compileShader(shaderSource, shaderType) {
      var shader = gl.createShader(shaderType);
      gl.shaderSource(shader, shaderSource);
      gl.compileShader(shader);

      if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
        throw "Shader compile failed with: " + gl.getShaderInfoLog(shader);
      }

      return shader;
    }

    function getUniformLocation(program, name) {
      var uniformLocation = gl.getUniformLocation(program, name);
      if (!uniformLocation) {
        throw 'Unable to get uniform location of ' + name;
      }
      return uniformLocation;
    }

    function getAttribLocation(program, name) {
      var attribLocation = gl.getAttribLocation(program, name);
      if (attribLocation < 0) {
        throw 'Unable to get attribute location of ' + name;
      }
      return attribLocation;
    }
  </script>
</body>
</html>
