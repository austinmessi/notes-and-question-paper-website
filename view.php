<?php
session_start();
include 'db.php';

$search = "";
$filter = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $filter = "AND (subject LIKE '%$search%' OR year LIKE '%$search%')";
}

// Fetch Notes & Question Papers with Search Filter
$notes = $conn->query("SELECT * FROM documents WHERE category='notes' $filter ORDER BY year DESC");
$question_papers = $conn->query("SELECT * FROM documents WHERE category='question_paper' $filter ORDER BY year DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Notes & Question Papers</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/protect.js"></script> <!-- Prevent Copy/Screenshot -->
    <style>
        /* Ensure canvas fills the entire background */
        #background-canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1; /* Make sure it stays behind the content */
        }

        /* Page content container */
        .container {
            max-width: 1000px;
            margin: 20px auto; /* Center the content */
            padding: 20px;
            position: relative;
            z-index: 1; /* Content stays on top of canvas */
        }

        /* Search Bar */
        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }
        .search-box input {
            padding: 10px;
            width: 80%;
            max-width: 400px;
        }

        /* Card Layout */
        .card-container {
            display: flex;
            justify-content: space-between; /* Ensure cards are aligned in one row */
            gap: 20px;
        }

        /* Card Styles */
        .card {
            width: 33.33%; /* Ensure all cards fit in one row */
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            text-align: center;
            background: #fff;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px; /* Adds spacing between cards */
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            margin: 5px 0;
        }

        .card a {
            text-decoration: none;
            background: #007BFF;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .card a:hover {
            background: #0056b3;
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
            padding-right: 50px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        /* Button Styles */
        .courses-btn,
        .logout-btn {
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .courses-btn {
            background-color: #128b19;
        }

        .courses-btn:hover {
            background-color: #0f7314;
        }

        .logout-btn {
            background-color: red;
        }

        .logout-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<header>
    <h2 style="text-align: center;">Available Notes & Question Papers</h2>

    <!-- Search Bar -->
    <div class="search-box" style="text-align: center  mt-5; display: flex; justify-content: center;">
        <form method="GET" style="display: flex; gap: 10px;">
            <input type="text" name="search" placeholder="Search by Subject or Year..." value="<?php echo $search; ?>" style="padding: 10px; width: 300px;">
            <button type="submit" style="padding: 15px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Search</button>
        </form>
    </div>
    <nav>
        <a href="courses.php" class="courses-btn">Courses</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
</header>

<canvas id="background-canvas"></canvas>

<div class="container">
    <!-- Notes Section -->
    <hr>
    <center>
    <h1>📖 Notes</h1>
    </center>
    <hr>
    <div class="card-container">
        <?php if ($notes->num_rows > 0) {
            while ($row = $notes->fetch_assoc()) { ?>
                <div class="card">
                    <h2><?php echo $row['title']; ?></h2>
                    <h3><b>Subject:</b> <?php echo $row['subject']; ?></h3>
                    <h3><b>Year:</b> <?php echo $row['year']; ?></h3>
                    <a href="view_file.php?id=<?php echo $row['id']; ?>" target="_blank">View</a>
                </div>
        <?php } } else { echo "<p>No Notes Available.</p>"; } ?>
    </div>

    <!-- Question Papers Section -->
    <hr>
    <center>
    <h1>📄 Question Papers</h1>
    </center>
    <hr>
    <div class="card-container">
        <?php if ($question_papers->num_rows > 0) {
            while ($row = $question_papers->fetch_assoc()) { ?>
                <div class="card">
                    <h2><?php echo $row['title']; ?></h2>
                    <h3><b>Subject:</b> <?php echo $row['subject']; ?></h3>
                    <h3><b>Year:</b> <?php echo $row['year']; ?></h3>
                    <a href="view_file.php?id=<?php echo $row['id']; ?>" target="_blank">View</a>
                </div>
        <?php } } else { echo "<p>No Question Papers Available.</p>"; } ?>
    </div>
</div>

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
        gl_FragColor = vec4(10, 10, 10, 10);
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
      -1.0,  1.0, 
      -1.0, -1.0, 
      1.0,  1.0, 
      1.0, -1.0,
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
