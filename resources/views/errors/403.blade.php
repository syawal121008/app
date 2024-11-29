
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Forbidden</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f1020;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .forbidden-container {
            text-align: center;
            background-color: rgba(15, 20, 40, 0.9);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotateX(20deg) rotateY(10deg);
            transform-style: preserve-3d;
            transition: transform 0.1s ease-out;
        }

        .error-code {
            font-size: 120px;
            font-weight: bold;
            background: linear-gradient(45deg, #00b0ff, #8c52ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 10px #00b0ff, 0 0 20px #8c52ff;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #b0b5c4;
            text-shadow: 0 0 5px #00b0ff;
        }

        .btn-custom {
            background: linear-gradient(45deg, #00b0ff, #8c52ff);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            transition: 0.3s;
            box-shadow: 0 0 10px #00b0ff, 0 0 20px #8c52ff;
        }

        .btn-custom:hover {
            background: linear-gradient(45deg, #8c52ff, #00b0ff);
            transform: scale(1.1);
            box-shadow: 0 0 20px #00b0ff, 0 0 30px #8c52ff;
        }

        .neon-glow {
            text-shadow: 0 0 10px #00b0ff, 0 0 20px #8c52ff;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="forbidden-container" id="container">
        <div class="error-code neon-glow">403</div>
        <h1 class="error-message neon-glow">Access Forbidden</h1>
        <p class="neon-glow">You do not have permission to access this resource.</p>
        <div>
            <a href="{{route('report.index')}}" class="btn btn-custom">
                <i class="fas fa-home me-2"></i>Return to Home
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/VincentGarreau/particles.js/particles.min.js"></script>
    <script>
        // Particle.js configuration
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#00b0ff" },
                shape: {
                    type: "circle",
                    stroke: { width: 0, color: "#000" },
                    polygon: { nb_sides: 5 },
                },
                opacity: {
                    value: 0.5,
                    random: false,
                    anim: { enable: false, speed: 1, opacity_min: 0.1, sync: false }
                },
                size: {
                    value: 5,
                    random: true,
                    anim: { enable: false, speed: 40, size_min: 0.1, sync: false }
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#00b0ff",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 6,
                    direction: "none",
                    random: false,
                    straight: false,
                    out_mode: "out",
                    bounce: false,
                    attract: { enable: false, rotateX: 600, rotateY: 1200 }
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: true, mode: "push" },
                    resize: true
                },
                modes: {
                    grab: { distance: 400, line_linked: { opacity: 1 } },
                    bubble: { distance: 400, size: 40, duration: 2, opacity: 8, speed: 3 },
                    repulse: { distance: 200, duration: 0.4 },
                    push: { particles_nb: 4 },
                    remove: { particles_nb: 2 }
                }
            },
            retina_detect: true
        });

        // 3D container effect
        const container = document.getElementById('container');
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth / 2 - e.clientX) / 25;
            const y = (window.innerHeight / 2 - e.clientY) / 25;
            container.style.transform = `translate(-50%, -50%) rotateX(${y}deg) rotateY(${x}deg)`;
        });
    </script>
</body>
</html>
