<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Opus Cinemas | $movie->name</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .movie-image {
            width: 30%;
            align-self: flex-start;
        }

        .splide__track {
            padding-left: 40px;
            /* Adjusts the spacing on the left side of the carousel */
            padding-right: 40px;
            /* Adjusts the spacing on the right side of the carousel */
        }

        .splide__arrow {
            z-index: 10;
            /* Ensures arrows are layered above items */
        }

        /* If the above padding doesn’t fully resolve it, adjust specific arrow positioning */
        .splide__arrow--prev {
            left: -20px;
            /* Moves the left arrow further out */
        }

        .splide__arrow--next {
            right: -20px;
            /* Moves the right arrow further out */
        }


        input {
            appearance: none;
        }

        .splide__slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .genre_bubble {
            background-color: #3d3c52;
            border-radius: 30px;
            text-align: center;
            padding: 10px 40px;
            display: inline-block;
            cursor: pointer;
            color: white;
            margin: 10px;
            transition: background-color 0.3s;
            /* Ensure the width adapts as needed */
            width: auto;
        }


        .genre_bubble:hover {
            background-color: #7773be;/
        }

        .seating {
            margin: 30px 0;
            width: 100%;
        }

        .seating-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .row {
            height: 20px;
        }

        .row td,
        .row th {
            text-align: start;
        }

        .seating-table .blank-row {
            height: 40px;
        }

        .legend,
        .legend-item {
            display: flex;
            align-items: center;
            padding-right: 20px;
        }

        .seat-taken {
            width: 20px;
            height: 20px;
            background-color: red;
        }

        .seat-available {
            width: 20px;
            height: 20px;
            background-color: gray;
        }


        .seat-available:hover {
            background-color: rgb(179, 172, 172);
            cursor: pointer;
        }


        .seat-selected {
            width: 20px;
            height: 20px;
            background-color: cyan;
        }

        .seat-selected:hover {
            cursor: pointer;
        }

        .screen {
            background-color: #3d3c52;
            width: 90%;
            margin: auto;
            text-align: center;
            margin-bottom: 20px;
            padding: 10px 0;
        }

        .right-page {
            width: 87%;
        }

        select {
            width: 40%;
            height: 30px;
            background-color: gainsboro;
        }

        .booking-prices {
            width: 100%;
            margin-top: 30px;
        }

        .blue_button {
            margin-top: 50px;
            margin-bottom: 50px;
        }
    </style>
</head>

<body class="bg-secondary mx-16 my-10">
    <x-nav.navbar input='' />

    <div class="w-full mt-10 flex flex-col md:flex-row justify-center text-white">
        <img src="{{ asset($movie->picture) }}" alt="" class="movie-image" />

        <section class="mt-10 md:mt-16 w-full md:w-2/5 ml-12">
            <h1 class="text-4xl font-bold">{{ $movie->title }}</h1>

            <span class="text-l mt-5">Cinema</span>
            <section class="splide h-50 w-100 flex flex-row justify-center" id="cinemaSplide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($cinemas as $cinema)
                            <li class="splide__slide">
                                <input type="radio" id="cinema_{{ $cinema->id }}" name="cinema"
                                    value="{{ $cinema->id }}" onchange="check2(this.value)">
                                <label for="cinema_{{ $cinema->id }}" class="genre_bubble text-nowrap">
                                    {{ $cinema->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>


            <br>


            <span class="text-l mt-5">Timing</span>

            <section class="splide h-50 w-100 flex flex-row justify-center mt-5" id="timingSplide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <!-- Movie timings will be dynamically inserted here -->
                    </ul>
                </div>
            </section>


            <div class="seating">
                <table class="seating-table">
                    <tr class="row first">
                        <th></th>
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                        <?php if ($i == 6): ?>
                        <th colspan="2"></th>
                        <?php endif; ?>
                        <th><?= $i ?></th>
                        <?php endfor; ?>
                    </tr>
                </table>
            </div>


            <div class="screen">Screen</div>

            <div class="legend">
                <div class="legend-item">
                    <div class="seat-taken"></div>
                    <span>Seat Taken</span>
                </div>
                <div class="legend-item">
                    <div class="seat-available"></div>
                    <span>Seat Available</span>
                </div>
                <div class="legend-item">
                    <div class="seat-selected"></div>
                    <span>Seat Selected</span>
                </div>
            </div>

            <table class="booking-prices">
                <tr>
                    <td>
                        <h3>Seats:</h3>
                    </td>
                    <td>
                        <span id="selected-seats">-</span>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        <h3>Price:</h3>
                    </td>
                    <td>
                        <span id="standardTicketLabel">Standard Ticket </span>
                    </td>
                    <td>
                        <span id="standardTicketAmt">$9.00 x 0</span>
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <span>GST 7%</span>
                    </td>
                    <td>
                        <span id="gstAmt">$-</span>
                    </td>
                </tr>

                <tr>
                    <td>
                    </td>
                    <td>
                        <span style="text-decoration: underline;">Total</span>
                    </td>
                    <td>
                        <span id="totalAmt">$-</span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <button class=" mt-5 py-2 px-10 bg-primary text-dark rounded-xl s" type="button"
                            onclick="proceedToPayment()">Proceed to
                            Payment</button>
                    </td>
                </tr>
            </table>

        </section>

    </div>


    <x-footer />
</body>
<script>
    new Splide('#cinemaSplide', {
        type: 'slide',
        perPage: 3,
        height: 100,
        gap: 10,
        pagination: false
    }).mount();
    new Splide('#timingSplide', {
        type: 'slide',
        perPage: 3,
        height: 100,
        gap: 10,
        pagination: false
    }).mount();
</script>

<script>
    function check2(cinema_id) {
        var radios = document.getElementsByName("cinema");

        for (var i = 0, length = radios.length; i < length; i++) {
            var label = document.querySelector(`label[for="${radios[i].id}"]`);

            label.style.backgroundColor = "#3d3c52";

            if (radios[i].checked) {
                label.style.backgroundColor = "#9eb2e0e1";
                console.log("Checked movie:", radios[i].value);
            }
        }

        fetchMovieTimings(cinema_id);
    }

    function fetchMovieTimings(cinema_id) {
        // Make an AJAX request to fetch movie timings for the selected cinema
        fetch(`http://localhost:8000/movie-timings/{{ $movie->id }}/${cinema_id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Get the Splide instance for the second Splide component
                const splideInstance = document.querySelector('#timingSplide .splide__list');

                // Clear previous timings
                splideInstance.innerHTML = '';

                // Populate the new timings
                data.forEach(timing => {
                    const li = document.createElement('li');
                    li.className = 'splide__slide';

                    // Create the radio input
                    const input = document.createElement('input');
                    input.type = 'radio';
                    input.id = `timing_${timing.id}`; // Ensure each input has a unique id
                    input.name = 'timing'; // Keep the same name attribute
                    input.value = timing.timing; // Set the value to the timing
                    input.onclick = regenerateSeatingTable;
                    // Create the label for the radio input
                    const label = document.createElement('label');
                    label.htmlFor = input.id; // Associate label with the input
                    label.className = 'genre_bubble text-nowrap'; // Keep the same class
                    label.textContent = timing.timing; // Display the timing text

                    // Append the input and label to the list item
                    li.appendChild(input);
                    li.appendChild(label);

                    // Append the list item to the splide instance
                    splideInstance.appendChild(li);
                });

                // Refresh the Splide instance to reflect changes
                new Splide('#timingSplide', {
                    type: 'slide',
                    perPage: 3,
                    height: 100,
                    gap: 10,
                    pagination: false
                }).mount();
            })
            .catch(error => console.error('Error fetching movie timings:', error));
    }


    function fetchTiming() {
        const selectedCinema = document.getElementsByName("cinema").value;
        fetchMovieTimings(selectedCinema);

    }

    const selectedSeats = new Set();

    function toggleSeat(element) {
        const value = element.getAttribute("data-value");
        if (element.classList.contains("seat-available")) {
            element.classList.remove("seat-available");
            element.classList.add("seat-selected");
            selectedSeats.add(value);
        } else if (element.classList.contains("seat-selected")) {
            element.classList.remove("seat-selected");
            element.classList.add("seat-available");
            selectedSeats.delete(value);
        }

        updateSelectedSeats();
    }

    function updateSelectedSeats() {
        const selectedSeatsArray = Array.from(selectedSeats);
        const selectedSeatsLabel =
            selectedSeatsArray.length > 0 ? selectedSeatsArray.join(", ") : "-";
        const standardTicketLabel = document.getElementById("standardTicketLabel");
        const standardTicketAmt = document.getElementById("standardTicketAmt");
        const gstAmt = document.getElementById("gstAmt");
        const totalAmt = document.getElementById("totalAmt");

        standardTicketLabel.innerText =
            selectedSeatsArray.length == 0 ?
            "Standard Ticket" :
            `Standard Ticket x ${selectedSeatsArray.length}`;

        standardTicketAmt.innerText =
            selectedSeatsArray.length == 0 ?
            "$0.00" :
            `$9.00 x ${selectedSeatsArray.length}`;

        let subtotal = selectedSeatsArray.length * 9;
        gstAmt.innerText =
            selectedSeatsArray.length == 0 ?
            "$0.00" :
            `$${(0.07 * subtotal).toFixed(2)}`;

        totalAmt.innerText =
            selectedSeatsArray.length == 0 ?
            "$0.00" :
            `$${(1.07 * subtotal).toFixed(2)}`;
        document.getElementById("selected-seats").innerText = selectedSeatsLabel;
    }

    function regenerateSeatingTable(timing = null) {
        const cinemaRadio = document.getElementsByName("cinema");

        let selectedCinema = null;

        for (let radio of cinemaRadio) {
            if (radio.checked) {
                selectedCinema = radio.value; // Get the value of the checked radio button
                break; // Exit the loop once you find the checked radio
            }
        }

        const timingRadios = document.getElementsByName("timing");


        let selectedTiming = null;

        for (let radio of timingRadios) {
            if (radio.checked) {
                selectedTiming = radio.value; // Get the value of the checked radio button
                break; // Exit the loop once you find the checked radio
            }
        }


        for (var i = 0, length = timingRadios.length; i < length; i++) {
            var label = document.querySelector(`label[for="${timingRadios[i].id}"]`);

            label.style.backgroundColor = "#3d3c52";

            if (timingRadios[i].checked) {
                label.style.backgroundColor = "#9eb2e0e1";
                console.log("Checked movie:", timingRadios[i].value);
            }
        }

        const seatingTable = document.querySelector(".seating-table");
        const rows = ["A", "B", "C", "D", "E", "F", "G", "H"];

        while (seatingTable.rows.length > 1) {
            seatingTable.deleteRow(1);
        }
        selectedSeats.clear();
        updateSelectedSeats();

        console.log("before fetch");
        fetch(
                `http://localhost:8000/getTakenSeats/${selectedCinema}/${ {{ $movie->id }} }/${selectedTiming}`
            )
            .then((response) => response.text())
            .then((text) => {
                console.log(text);
                return JSON.parse(text);
            })
            .then((takenSeats) => {
                console.log("takenSeats");
                console.log(takenSeats);
                rows.forEach((rowLabel) => {
                    const row = seatingTable.insertRow();
                    const cell = row.insertCell();
                    cell.innerText = rowLabel;
                    if (rowLabel === "D") {
                        seatingTable.insertRow();
                        const blankRow =
                            seatingTable.rows[seatingTable.rows.length - 1];
                        blankRow.classList.add("blank-row");
                        const blankCell = blankRow.insertCell();
                        blankCell.colSpan = 14;
                        const row = seatingTable.insertRow();
                        const cell = row.insertCell();
                    }

                    for (let i = 1; i <= 12; i++) {
                        if (i === 6) {
                            row.insertCell();
                            row.insertCell();
                        }
                        const seatCell = row.insertCell();
                        const seatValue = rowLabel + i;
                        const seatStatus = takenSeats.includes(seatValue) ?
                            "taken" :
                            "available";

                        const seatDiv = document.createElement("div");
                        seatDiv.setAttribute("data-value", seatValue);
                        seatDiv.className = `seat-${seatStatus}`;
                        seatDiv.onclick = function() {
                            toggleSeat(this);
                        };

                        seatCell.appendChild(seatDiv);
                    }
                });
            })
            .catch((error) => {
                console.error("Error fetching seat data:", error);
            });
    }

    function proceedToPayment() {
        const cinemaRadio = document.getElementsByName("cinema");
        let selectedCinema = null;

        for (let radio of cinemaRadio) {
            if (radio.checked) {
                selectedCinema = radio.value;
                break;
            }
        }

        const timingRadios = document.getElementsByName("timing");
        let selectedTiming = null;

        for (let radio of timingRadios) {
            if (radio.checked) {
                selectedTiming = radio.value;
                break;
            }
        }

        const selectedSeats = Array.from(
            document.querySelectorAll(".selected-seat")
        ).map((seat) => seat.dataset.value);

        // Construct query parameters
        const params = new URLSearchParams({
            seats: selectedSeats.join(','), // Convert array to comma-separated string
            cinema_id: selectedCinema,
            movie_id: {{ $movie->id }},
            timing: selectedTiming,
        });

        // Redirect to the payment page with query parameters
        window.location.href = `http://localhost:8000/payment/view?${params.toString()}`;
    }


    fetchTiming();
</script>

</html>
