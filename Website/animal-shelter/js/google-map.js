function initMap() {
    // The location of shelter
    const shelter = { lat: 51.944247, lng: 4.566949 };
    // The map, centered at shelter
    const map = new google.maps.Map(document.getElementById("google-map"), {
      zoom: 15,
      center: shelter,
    });
    // The marker, positioned at shelter
    const marker = new google.maps.Marker({
      position: shelter,
      map: map,
    });
  }
