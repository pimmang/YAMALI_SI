<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="bg-white w-full h-full rounded-xl z-20">
        <div class="bg-white rounded-xl overflow-hidden h-full">
            <div class="w-full bg-orange-100">
                <p class="uppercase font-semibold text-gray-700 p-4">Grafik Hubungan Kontak Pasien TBC</p>
            </div>
            <div id="container" class="w-full h-full"></div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/d3@7"></script>
    <script>
        const container = d3.select("#container");
        const width = container.node().getBoundingClientRect().width;
        const height = container.node().getBoundingClientRect().height;
        // Select or create the SVG container within #container
        const svg = d3.select("#container")
            .append("svg")
            .attr("width", "100%")
            .attr("height", "100%");
        // Data for nodes and links
        const nodes = @json($nodes);
        const links = @json($links);

        console.log(@json($nodes));
        console.log(@json($links));

        // Initialize the simulation with forces
        const simulation = d3.forceSimulation(nodes)
            .force("link", d3.forceLink(links).id(d => d.id).distance(100))
            .force("charge", d3.forceManyBody().strength(-200))
            .force("center", d3.forceCenter(width / 2, height / 2));

        // Draw links
        const linkLine = svg.append("g")
            .attr("class", "links")
            .selectAll("line")
            .data(links)
            .enter().append("line")
            .attr("class", "link")
            .style("stroke", "#aaa")
            .style("stroke-width", 1.5);

        // Draw nodes
        const node = svg.append("g")
            .attr("class", "nodes")
            .selectAll("circle")
            .data(nodes)
            .enter().append("circle")
            .attr("class", "node")
            .attr("r", d => d.type === "indexUtama" ? 10 : 5)
            .style("fill", d => d.type === "index" || d.type === "indexUtama" ? "#FF5A1F" :
            "#EF4545") // Warna oranye untuk tipe 'index'
            .call(drag(simulation));

        // Add labels
        const labels = svg.append("g")
            .attr("class", "labels")
            .selectAll("text")
            .data(nodes)
            .enter().append("text")
            .attr("class", "label")
            .attr("dy", -15) // Position above the nodes
            .attr("text-anchor", "middle")
            .style("font-size", "12px")
            .style("fill", "#333")
            .text(d => `${d.label}`);

        // Function to update node, link, and label positions at each tick of the simulation
        simulation.on("tick", () => {
            linkLine
                .attr("x1", d => d.source.x)
                .attr("y1", d => d.source.y)
                .attr("x2", d => d.target.x)
                .attr("y2", d => d.target.y);

            node
                .attr("cx", d => d.x)
                .attr("cy", d => d.y);

            labels
                .attr("x", d => d.x)
                .attr("y", d => d.y);
        });

        // Function for dragging nodes
        function drag(simulation) {
            function dragstarted(event, d) {
                if (!event.active) simulation.alphaTarget(0.3).restart();
                d.fx = d.x;
                d.fy = d.y;
            }

            function dragged(event, d) {
                d.fx = event.x;
                d.fy = event.y;
            }

            function dragended(event, d) {
                if (!event.active) simulation.alphaTarget(0);
                d.fx = null;
                d.fy = null;
            }

            return d3.drag()
                .on("start", dragstarted)
                .on("drag", dragged)
                .on("end", dragended);
        }
    </script>

</div>
