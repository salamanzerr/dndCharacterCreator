document.addEventListener('DOMContentLoaded', function() {
    const diceCanvas = document.getElementById('diceCanvas');
    if (!diceCanvas) {
        console.error('Failed to find the diceCanvas element');
        return; // Stop the script if the canvas isn't found
    }
    const diceContainer = document.getElementById('diceContainer');
        const toggleButton = document.getElementById('toggleDiceButton');
        const rollButton = document.getElementById('rollButton');
        //const diceCanvas = document.getElementById('diceCanvas');
        const diceNumber = document.getElementById('diceNumber');
        const renderer = new THREE.WebGLRenderer({ canvas: diceCanvas });



        /*const diceContainer = document.getElementById('diceContainer');
        const toggleButton = document.getElementById('toggleDiceButton');
        const rollButton = document.getElementById('rollButton');
        //const diceCanvas = document.getElementById('diceCanvas');
        const diceNumber = document.getElementById('diceNumber');
        const renderer = new THREE.WebGLRenderer({ canvas: diceCanvas });
*/
        let isDiceVisible = false;

        toggleButton.addEventListener('click', () => {
            isDiceVisible = !isDiceVisible;
            diceContainer.style.display = isDiceVisible ? 'block' : 'none';
            if (isDiceVisible) {
                rollDice();
            }
        });

        function rollDice() {
            //--------------------------creates scene/light/dice/shadows-------------------------------------
            const scene = new THREE.Scene();
            scene.background = new THREE.Color(0x292E28);
            const camera = new THREE.PerspectiveCamera(750, (diceCanvas.width / diceCanvas.height), .1, 1000);
            camera.position.z = 5;

            // Enable shadows in the renderer
            renderer.shadowMap.enabled = true;

            // Create a directional light
            const directionalLight = new THREE.DirectionalLight(0xffffff, 1);

            // Set up shadow properties for the light
            directionalLight.castShadow = true;
            directionalLight.shadow.mapSize.width = 1024;
            directionalLight.shadow.mapSize.height = 1024;
            directionalLight.shadow.camera.near = 0.5;
            directionalLight.shadow.camera.far = 50;

            // Set the position of the light
            directionalLight.position.set(5, 8, 7); // You can adjust the position as needed

            // Add the light to the scene
            scene.add(directionalLight);


            const geometry = new THREE.IcosahedronGeometry(1, 1);

            const faceMaterial = new THREE.MeshBasicMaterial({ color: 0xC83230 }); // Material for the faces
            const edgeMaterial = new THREE.LineBasicMaterial({ color: 0x000000 }); // Material for the edges


            const material = new THREE.MeshNormalMaterial();
            const material2 = new THREE.MeshBasicMaterial({color: 0xffffff});
            const dice = new THREE.Mesh(geometry, faceMaterial);
            dice.castShadow = true;

            // Configure material to receive shadows
            material.receiveShadow = true;

            scene.add(dice);

            // Create edges
            const edges = new THREE.EdgesGeometry(geometry);
            const edgeLines = new THREE.LineSegments(edges, edgeMaterial);
            scene.add(edgeLines);

            //-----------------------continuous spin-------------------------
            // Add an animate function for continuous rotation
            function animateContinuous() {
                dice.rotation.x += 0.01;
                dice.rotation.y += 0.01;
                dice.rotation.z += 0.01;
                edgeLines.rotation.x = dice.rotation.x;
                edgeLines.rotation.y = dice.rotation.y;
                edgeLines.rotation.z = dice.rotation.z;
                renderer.render(scene, camera);
                requestAnimationFrame(animateContinuous);
            }

            // Call the animateContinuous function
            animateContinuous();

            //--------------------Click and drag dice--------------------------
            let isDragging = false;
            let previousMousePosition = {
                x: 0,
                y: 0
            };

            // Add event listeners to handle mouse events
            diceCanvas.addEventListener('mousedown', onMouseDown);
            diceCanvas.addEventListener('mouseup', onMouseUp);
            diceCanvas.addEventListener('mousemove', onMouseMove);

            function onMouseDown(event) {
                isDragging = true;
                previousMousePosition = {
                    x: event.clientX,
                    y: event.clientY
                };
            }

            function onMouseUp() {
                isDragging = false;
            }

            function onMouseMove(event) {
                if (isDragging) {
                    const deltaMove = {
                        x: event.clientX - previousMousePosition.x,
                        y: event.clientY - previousMousePosition.y
                    };

                    dice.rotation.x += deltaMove.y * 0.01;
                    dice.rotation.y += deltaMove.x * 0.01;

                    previousMousePosition = {
                        x: event.clientX,
                        y: event.clientY
                    };
                }
            }

//---------------------------------Random # between 1 and 20 for dice----------------------------------
            const rollTimes = 10 + Math.floor(Math.random() * 10);
            let count = 0;

            function animate() {
                if (count >= rollTimes) return;
                requestAnimationFrame(animate);
                dice.rotation.x += Math.random() * 0.5;
                dice.rotation.y += Math.random() * 0.5;
                dice.rotation.z += Math.random() * 0.5;
                edgeLines.rotation.x = dice.rotation.x;
                edgeLines.rotation.y = dice.rotation.y;
                edgeLines.rotation.z = dice.rotation.z;
                renderer.render(scene, camera);
                if (++count >= rollTimes) {
                    const finalValue = Math.floor(Math.random() * 20) + 1;
                    diceNumber.textContent = `Rolled: ${finalValue}`;
                }

            }

            animate();
        }
        //also for re-roll
        rollButton.addEventListener('click', rollDice);
});
