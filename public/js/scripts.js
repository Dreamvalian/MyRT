/*!
 * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2023 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

function exportToCSV(modalId) {
    var table = document.getElementById(modalId).querySelector("table");

    var csv = [];
    var rows = table.querySelectorAll("tr");
    for (var i = 0; i < rows.length; i++) {
        var row = [],
            cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
        }
        csv.push(row.join(","));
    }
    var csvString = csv.join("\n");
    var link = document.createElement("a");
    link.style.display = "none";
    link.setAttribute("target", "_blank");
    link.setAttribute(
        "href",
        "data:text/csv;charset=utf-8," + encodeURIComponent(csvString)
    );
    link.setAttribute("download", "data.csv");
    document.body.appendChild(link);

    link.click();
    document.body.removeChild(link);
}

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    const dateStartInput = document.getElementById("date_start");
    const dateEndInput = document.getElementById("date_end");

    dateStartInput.min = today;

    dateStartInput.addEventListener("change", function () {
        dateEndInput.min = dateStartInput.value;
    });

    dateEndInput.addEventListener("change", function () {
        if (dateEndInput.value < dateStartInput.value) {
            dateEndInput.value = dateStartInput.value;
        }
    });
});

window.addEventListener("DOMContentLoaded", (event) => {
    const categoryValue = document.getElementById("category");
    const reportTitleElement = document.querySelector('label[for="title"]');
    const reportDescriptionElement = document.querySelector(
        'label[for="description"]'
    );
    const reportDateStartElement = document.querySelector(
        'label[for="reportDate"]'
    );
    const reportDateEndElement = document.querySelector(
        'label[for="reportDateEnd"]'
    );
    const dateSelectorContainer = document.getElementById("dateSelector");
    const dateStartElement = document.getElementById("date_start");
    const dateEndElement = document.getElementById("date_end");

    // dateEndElement.style.display = "hidden";

    // console.log((reportTitleElement.innerHTML = "Gatau"));


    categoryValue.addEventListener("change", function () {
        const selectedCategory = this.value;

        if (selectedCategory == "Tamu") {
            reportTitleElement.innerHTML = "Nama Tamu";
            reportDescriptionElement.innerHTML = "Deskripsi Tamu";
            reportDateStartElement.innerHTML = "Tanggal Kedatangan";
            reportDateEndElement.innerHTML = "Tanggal Kepulangan";

            dateSelectorContainer.style.display = "";
            dateStartElement.required = true;
            dateEndElement.required = true;
        } else if (selectedCategory == "Kegiatan") {
            reportTitleElement.innerHTML = "Nama Kegiatan";
            reportDescriptionElement.innerHTML = "Deskripsi Kegiatan";
            reportDateStartElement.innerHTML = "Tanggal Mulai";
            reportDateEndElement.innerHTML = "Tanggal Selesai";

            dateSelectorContainer.style.display = "";
            dateStartElement.required = true;
            dateEndElement.required = true;
        } else {
            reportTitleElement.innerHTML = "Judul Laporan";
            reportDescriptionElement.innerHTML = "Deskripsi";

            dateSelectorContainer.style.display = "none";
            dateStartElement.required = false;
            dateEndElement.required = false;
        }
    });
});


