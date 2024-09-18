<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="assets/css/lineicons.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="assets/css/materialdesignicons.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    />

    <link rel="stylesheet" href="./assets/css/styles.css" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
      .sidebar {
        height: 100vh;
        background-color: #fff;
        box-shadow: 0px 0px 30px 0px rgba(200, 208, 216, 0.3);
      }
      .offcanvas {
        width: 200px !important;
      }
      .text:hover {
        text-decoration: none !important;
        color: #365cf5;
      }
      .link:hover {
        color: #1a2142;
      }
      .link:hover i:before {
        color: #365cf5;
      }
      main {
        background-color: #f7f8fa;
      }
      .sidebar .nav-link {
        padding: 0.5rem 1rem;
        text-align: center;
      }
      .sidebar .nav-link i {
        font-size: 1.5rem;
      }
      #map {
        height: 400px;
      }
      .chart-container {
        height: 300px;
      }

      .rich-list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 0 !important;
      }
      .rich-list-item {
        background-color: #e6e8f4;
        border-bottom: 1px solid #dcdde02b;

        padding: 15px;
        cursor: pointer;

        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      .rich-list-item:hover {
        background-color: #e6e8f4;
      }
      .rich-list-item h6 {
        margin-bottom: 5px;
        color: #6c6c73;
      }
      .rich-list-item p {
        margin-bottom: 5px;
        font-size: 0.9rem;
        color: #7d7987;
      }
      .rich-list-item .badge {
        font-size: 0.8rem;
      }
    </style>
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <div class="row">
      <div class="d-md-none">
        <button
          class="btn m-3"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#staticBackdrop"
          aria-controls="staticBackdrop"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24px"
            height="24px"
            viewBox="0 0 24 24"
            fill="none"
            class="burger-icon"
          >
            <path
              d="M4 18L20 18"
              stroke="#000000"
              stroke-width="2"
              stroke-linecap="round"
            />
            <path
              d="M4 12L20 12"
              stroke="#000000"
              stroke-width="2"
              stroke-linecap="round"
            />
            <path
              d="M4 6L20 6"
              stroke="#000000"
              stroke-width="2"
              stroke-linecap="round"
            />
          </svg>
        </button>

        <div
          class="offcanvas offcanvas-start"
          data-bs-backdrop="static"
          tabindex="-1"
          id="staticBackdrop"
          aria-labelledby="staticBackdropLabel"
        >
          <div class="offcanvas-header">
            <button
              type="button"
              class="btn-close ms-auto"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body sidebar">
            <div
              class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
            >
              <ul
                class="nav nav-pills mx-auto flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                id="menu"
              >
                <li class="nav-item">
                  <a
                    href="#"
                    class="nav-link align-middle px-0"
                    style="color: #1a2142"
                  >
                    <i class="bi bi-house me-1" style="color: #365cf5"></i>
                    <span class="text text-decoration-underline">Home</span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="nav-link link px-0 align-middle"
                    style="color: #9aa4ca"
                  >
                    <i class="bi bi-speedometer2 me-1"></i>
                    <span class="text text-decoration-underline">About</span>
                  </a>
                </li>
                <li>
                  <a
                    href="#"
                    class="nav-link link px-0 align-middle"
                    style="color: #9aa4ca"
                  >
                    <i class="bi bi-table me-1"></i>
                    <span class="text text-decoration-underline">Contact</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="d-none d-md-block col-2 px-0 sidebar">
        <div
          class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100"
        >
          <ul
            class="nav nav-pills mx-auto flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
            id="menu"
          >
            <li class="nav-item">
              <a
                href="#"
                class="nav-link align-middle px-0"
                style="color: #1a2142"
              >
                <i class="bi bi-house me-1" style="color: #365cf5"></i>
                <span class="text text-decoration-underline">Home</span>
              </a>
            </li>
            <li>
              <a
                href="#"
                class="nav-link link px-0 align-middle"
                style="color: #9aa4ca"
              >
                <i class="bi bi-speedometer2 me-1"></i>
                <span class="text text-decoration-underline">About</span>
              </a>
            </li>
            <li>
              <a
                href="#"
                class="nav-link link px-0 align-middle"
                style="color: #9aa4ca"
              >
                <i class="bi bi-table me-1"></i>
                <span class="text text-decoration-underline">Contact</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-12 col-md-10 p-0">
        <div class="overlay"></div>

        <main class="pt-2">
          <div class="row mx-3">
            <!-- Rich list with details -->
            <div class="col-md-12 col-lg-4 mb-3 mb-lg-0">
              <div class="card" style="border-radius: 0; height: 100%">
                <div class="card-header">
                  <h3
                    class="card-title"
                    style="color: #5f6065; font-weight: bold"
                  >
                    Monitoring
                  </h3>
                  <div class="d-flex">
                    <a
                      href="#"
                      style="
                        background-color: #114f83;
                        width: 50%;
                        padding: 3px;
                      "
                      class="text-decoration-none text-white d-inline-block text-center"
                      >Current</a
                    >
                    <a
                      href="#"
                      style="
                        background-color: #aaaaaa30;
                        width: 50%;
                        padding: 3px;
                      "
                      class="text-decoration-none text-black d-block text-center"
                      >Advanced</a
                    >
                  </div>
                </div>
                <div class="card-body">
                  <ul class="rich-list">
                    <!-- <li
                      class="rich-list-item"
                      style="background-color: #e6e8f4"
                    >
                    <h6 class="fw-bold"></h6>
                      <p class="crop-desc"></p>
                      <p class="crop-type"></p>

                    </li> -->
                    <!-- <li class="rich-list-item">
                      <h6 class="fw-bold"></h6>
                      <p class="crop-desc"></p>
                      <p class="crop-type"></p>

                    </li>
                    <li class="rich-list-item">
                      <h6 class="fw-bold"></h6>
                      <p class="crop-desc"></p>
                      <p class="crop-type"></p>

                    </li> -->
                  </ul>
                </div>
              </div>
            </div>

            <!-- Big container -->
            <div class="col-md-12 col-lg-8" style="height: 100%">
              <!-- Leaflet Map -->
              <div
                class="card mb-3 mb-lg-0"
                style="border-radius: 0 !important"
              >
                <div class="card-body">
                  <div class="d-flex p-3">
                    <p style="color: #114f83">All Cropsenses</p>
                  </div>
                  <div class="d-flex">
                    <a
                      href="#"
                      style="color: #114f83; width: 50%; padding: 3px"
                      class="text-decoration-none d-inline-block text-center"
                      >True Color</a
                    >
                    <a
                      href="#"
                      style="
                        background-color: #aaaaaa30;
                        width: 50%;
                        padding: 3px;
                      "
                      class="text-decoration-none text-black d-block text-center"
                      >Advanced</a
                    >
                  </div>
                  <div id="map"></div>
                </div>
              </div>

              <!-- Tabs with charts -->
              <div class="card mb-3" style="border-radius: 0">
                <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link active"
                        id="chart1-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#chart1-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="chart1-tab-pane"
                        aria-selected="true"
                      >
                        Light Chart
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="chart2-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#chart2-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="chart2-tab-pane"
                        aria-selected="false"
                      >
                        Temperature Chart
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="chart3-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#chart3-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="chart3-tab-pane"
                        aria-selected="false"
                      >
                        Tds Chart
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="chart4-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#chart4-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="chart4-tab-pane"
                        aria-selected="false"
                      >
                        Soil Moisture Chart
                      </button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button
                        class="nav-link"
                        id="chart5-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#chart5-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="chart5-tab-pane"
                        aria-selected="false"
                      >
                        Humidity Chart
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div
                      class="tab-pane fade show active"
                      id="chart1-tab-pane"
                      role="tabpanel"
                      aria-labelledby="chart1-tab"
                      tabindex="0"
                    >
                      <div class="chart-container">
                        <canvas id="chart1"></canvas>
                      </div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="chart2-tab-pane"
                      role="tabpanel"
                      aria-labelledby="chart2-tab"
                      tabindex="0"
                    >
                      <div class="chart-container">
                        <canvas id="chart2"></canvas>
                      </div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="chart3-tab-pane"
                      role="tabpanel"
                      aria-labelledby="chart3-tab"
                      tabindex="0"
                    >
                      <div class="chart-container">
                        <canvas id="chart3"></canvas>
                      </div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="chart4-tab-pane"
                      role="tabpanel"
                      aria-labelledby="chart4-tab"
                      tabindex="0"
                    >
                      <div class="chart-container">
                        <canvas id="chart4"></canvas>
                      </div>
                    </div>
                    <div
                      class="tab-pane fade"
                      id="chart5-tab-pane"
                      role="tabpanel"
                      aria-labelledby="chart5-tab"
                      tabindex="0"
                    >
                      <div class="chart-container">
                        <canvas id="chart5"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/test.js" type="module"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Initialize Leaflet map

      const farmsList = document.querySelector(".rich-list");
      const result = fetch("http://127.0.0.1:8000/dashboard-api/farms")
        .then((res) => {
          let data = res.json();

          console.log('data is ,' ,data);

          return data;
        })
        .then((data) => {
          let farms = data.farms;

          const markerOptions = { draggable: false }; // allow mouse-dragging
          var map = L.map("map").setView([24.7136, 46.6753], 8);

          // charts section

          for (let i = 0; i < farms.length; i++) {
            let farm = document.createElement("li");
            farm.className = "rich-list-item";
            let farmName = document.createElement("h6");
            farmName.innerHTML = `Name : ${farms[i].name}`;
            let farmDescription = document.createElement("p");
            farmDescription.innerHTML = `Description : ${farms[i].description}`;
            let farmType = document.createElement("p");
            farmType.innerHTML = `Type : ${farms[i].crop_type}`;

            farm.appendChild(farmName);
            farm.appendChild(farmDescription);
            farm.appendChild(farmType);

            farmsList.appendChild(farm);

            var myMarker = {};

            var chartData = {};

            var chart1 = null

            var chart2 = null

            var chart3 = null

            var chart4 = null

            var chart5 = null


            farm.onclick = function () {



              // Map Section
              // remove existing marker

              if (myMarker !== undefined) {
                map.removeLayer(myMarker);
              }

              // add current marker

              myMarker = L.marker(
                [farms[i].lat, farms[i].long],
                markerOptions
              ).addTo(map);

              // Chart Section

              fetch(`http://127.0.0.1:8000/dashboard-api/farms/${farms[i].id}`)
                .then((data) => {
                  chartData = data.json();

                  return chartData;
                })
                .then((res) => {

                   let firstChart = document.getElementById('chart1');

                   if(chart1 !== null){
                    chart1.destroy()
                   }




                     chart1 =  new Chart(document.getElementById("chart1"), {
                      type: "line",
                      data: {
                        labels: [
                          "Sunday",
                          "Monday",
                          "Tuesday",
                          "Wednesday",
                          "Thursday",
                          "Friday",
                          "Saturday",
                        ],
                        datasets: [
                          {
                            label: "Light Data",
                            data: res.lightReads,
                            backgroundColor: [
                              "rgba(255, 99, 132, 0.2)",
                              "rgba(54, 162, 235, 0.2)",
                              "rgba(255, 206, 86, 0.2)",
                              "rgba(75, 192, 192, 0.2)",
                              "rgba(153, 102, 255, 0.2)",
                              "rgba(255, 159, 64, 0.2)",
                            ],
                            borderColor: [
                              "rgba(255, 99, 132, 1)",
                              "rgba(54, 162, 235, 1)",
                              "rgba(255, 206, 86, 1)",
                              "rgba(75, 192, 192, 1)",
                              "rgba(153, 102, 255, 1)",
                              "rgba(255, 159, 64, 1)",
                            ],
                            borderWidth: 1,
                          },
                        ],
                      },
                      options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                          y: {
                            beginAtZero: true,
                          },
                        },
                      },
                    });


                 if(chart2 !== null){
                  chart2.destroy();
                 }




                   chart2 = new Chart(document.getElementById("chart2"), {
                    type: "line",
                    data: {
                      labels: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                      ],
                      datasets: [
                        {
                          label: "Temperature Data",
                          data: res.temperatureReads,
                          backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                          ],
                          borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                          ],
                          borderWidth: 1,
                        },
                      ],
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true,
                        },
                      },
                    },
                  });


                  if(chart3 !== null){
                    chart3.destroy();
                  }
                   chart3 = new Chart(document.getElementById("chart3"), {
                    type: "line",
                    data: {
                      labels: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                      ],
                      datasets: [
                        {
                          label: "Tds Data",
                          data: res.tdsReads,
                          backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                          ],
                          borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                          ],
                          borderWidth: 1,
                        },
                      ],
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true,
                        },
                      },
                    },
                  });

                  if(chart4 !== null){
                    chart4.destroy()
                  }
                   chart4 = new Chart(document.getElementById("chart4"), {
                    type: "line",
                    data: {
                      labels: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                      ],
                      datasets: [
                        {
                          label: "Soil Moisture Data",
                          data: res.soilMoistureReads,
                          backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                          ],
                          borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                          ],
                          borderWidth: 1,
                        },
                      ],
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true,
                        },
                      },
                    },
                  });

                  if(chart5 !== null){
                    chart5.destroy()
                  }
                   chart5 = new Chart(document.getElementById("chart5"), {
                    type: "line",
                    data: {
                      labels: [
                        "Sunday",
                        "Monday",
                        "Tuesday",
                        "Wednesday",
                        "Thursday",
                        "Friday",
                        "Saturday",
                      ],
                      datasets: [
                        {
                          label: "Humidity Data",
                          data: res.humidityReads,
                          backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                          ],
                          borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                          ],
                          borderWidth: 1,
                        },
                      ],
                    },
                    options: {
                      responsive: true,
                      maintainAspectRatio: false,
                      scales: {
                        y: {
                          beginAtZero: true,
                        },
                      },
                    },
                  });
                });
            };
          }

          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
              '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
          }).addTo(map);
        });

      // Sample chart data and configuration

      // Create charts
    </script>
  </body>
</html>
