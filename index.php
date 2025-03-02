<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSS E-LIBRARY</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Hero Section Styles */
        .hero {
            background: url('1img.jpg') no-repeat center center/cover;
            height: 450px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-radius: 50px;
            margin: 50px;
            background-size:cover;
            position: relative;
            z-index: 1;
        }
        .hero-buttons {
            margin-top: 20px;
        }
        .hero-buttons .btn {
            margin: 0 10px; /* Space between buttons */
            padding: 10px 20px; /* Button padding */
            font-size: 16px; /* Button text size */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s ease, color 0.3s ease;
            background-color: white; /* White background by default */
            color: #000080; /* Dark blue text by default */
            border: 2px solid #000080; /* Dark blue border */
        }
        .hero-buttons .btn:hover {
            background-color: #000080; /* Dark blue background on hover */
            color: white; /* White text on hover */
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

        /* Course Categories Styles */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .course-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .course-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #000080;
        }
        .course-card p {
            font-size: 16px;
            color: #666;
            margin: 0;
        }

        /* Footer Styles */
        footer {
            background-color: #000080; /* Dark blue background */
            color: white; /* White text */
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
        footer a {
            color: white; /* White text for links */
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    
    <!-- Canvas for Background Animation -->
    <canvas id="background-canvas" style="position: absolute; top: 0; left: 0; z-index: -1;"></canvas>

    <!-- Navbar -->
    <header>
        <h1>GSS E-LIBRARY</h1>
        <nav>
            <a href="login.php">login</a>
            <a href="register.php">sign-up</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1 class="fw-bold">Welcome To Gss Library</h1>
            <!-- Login and Sign Up Buttons -->
            <div class="hero-buttons">
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Sign Up</a>
            </div>
        </div>
    </div>

    <!-- Course Categories Section -->
    <div class="container my-5">
        <h2 class="text-center" style="color:#000080">COURSE CATEGORIES</h2>
        <p class="text-center mb-5">Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>

        <!-- Course Categories Grid -->
        <div class="course-grid">
            <div class="course-card">
                <h3>Business</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Health & Psychology</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Accounting</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Science & Technology</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Art & Media</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Real Estate</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Language</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
            <div class="course-card">
                <h3>Web & Programming</h3>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Gss Library. All rights reserved.</p>
        <p>
            <a href="index1.html">Home</a> |
            <a href="courses.html">Courses</a> |
            <a href="notes.html">Notes</a> |
            <a href="questionpaper.html">Question Papers</a> |
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Add Your JavaScript Code Here -->
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
      if (uniformLocation === -1) {
        throw 'Can not find uniform ' + name + '.';
      }
      return uniformLocation;
    }

    function getAttribLocation(program, name) {
      var attributeLocation = gl.getAttribLocation(program, name);
      if (attributeLocation === -1) {
        throw 'Can not find attribute ' + name + '.';
      }
      return attributeLocation;
    }

    canvas.onmousemove = function(e) {
      mouse.x = e.clientX;
      mouse.y = e.clientY;
    };
  </script>

</body>
</html>
