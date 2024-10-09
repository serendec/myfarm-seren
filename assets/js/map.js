document.addEventListener("DOMContentLoaded", () => {
    let map;
    let autocomplete;
    let locations;
    let infoWindow;
    let currentCenterLocation = null;
    const markers = [];

    const initMap = () => {
        initializeMap();
        loadLocations();
        createMarkers();
        setupMarkerClusterer();
        setupAutocomplete();
        setupLocationButton();
        setupDistanceChangeListener();
    };

    const initializeMap = () => {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 35.6895, lng: 139.6917 }, // 初期位置（例：東京）
            zoom: 9
        });
        infoWindow = new google.maps.InfoWindow();
    };

    const loadLocations = () => {
        try {
            locations = JSON.parse(document.getElementById('map-data').textContent);
        } catch (error) {
            console.error('Error parsing location data:', error);
            alert('位置情報の取得に失敗しました。');
        }
    };

    const createMarkers = () => {
        if (!locations) return;
    
        const getRandomOffset = () => {
            // -0.00005から0.00005の範囲でランダムなオフセットを生成
            return (Math.random() - 0.5) * 0.0001;
        };
    
        const usedCoordinates = new Set(); // 重複チェックのためのセット
    
        locations.forEach(location => {
            const lat = parseFloat(location.latitude);
            const lng = parseFloat(location.longitude);
    
            if (isNaN(lat) || isNaN(lng)) {
                console.warn(`Invalid location for ${location.title}: Latitude or Longitude is not a number.`);
                return;
            }
    
            let position = { lat, lng };
            let positionKey = `${lat.toFixed(5)},${lng.toFixed(5)}`;
    
            // 既に同じ座標が使用されている場合はランダムにオフセットを適用
            while (usedCoordinates.has(positionKey)) {
                position.lat = lat + getRandomOffset();
                positionKey = `${position.lat.toFixed(5)},${lng.toFixed(5)}`;
            }
    
            // 新しい座標をセットに追加
            usedCoordinates.add(positionKey);
    
            // マーカーの作成
            const marker = new google.maps.Marker({
                position: position,
                map: map,
                title: location.title
            });
    
            // マーカークリック時のイベントリスナーを追加
            marker.addListener('click', () => {
                const contentString = `<div><strong>${location.title}</strong><br>
                                       <a href="${location.url}" class="infowindow-btn">農園詳細</a></div>`;
                infoWindow.setContent(contentString);
                infoWindow.open(map, marker);
            });

            // マーカーを配列に追加
            markers.push(marker);
        });
    };

    const setupMarkerClusterer = () => {
        // マーカークラスタリングの設定
        new MarkerClusterer(map, markers, {
            imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        });
    };

    const setupAutocomplete = () => {
        const input = document.getElementById('location-input');
        autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        autocomplete.addListener('place_changed', () => handlePlaceChanged());
    };

    const handlePlaceChanged = () => {
        const place = autocomplete.getPlace();
        if (!place.geometry) {
            alert("入力した場所が見つかりませんでした。");
            return;
        }

        document.getElementById('location-input').value = place.name;

        const marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
        });

        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
            setTimeout(() => map.setZoom(12), 0);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(12);
        }

        currentCenterLocation = {
            lat: place.geometry.location.lat(),
            lng: place.geometry.location.lng()
        };

        showLoadingSpinner(true);
        filterFarms(currentCenterLocation);
    };

    const setupLocationButton = () => {
        document.getElementById('get-location').addEventListener('click', () => {
            if (navigator.geolocation) {
                showLoadingSpinner(true);
                navigator.geolocation.getCurrentPosition(
                    position => handleGeolocationSuccess(position),
                    () => handleGeolocationError()
                );
            } else {
                alert('お使いのブラウザでは現在地の取得がサポートされていません。');
            }
        });
    };

    const handleGeolocationSuccess = (position) => {
        const userLocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };

        new google.maps.Marker({
            position: userLocation,
            map: map,
            title: '現在地'
        });

        map.setCenter(userLocation);
        map.setZoom(12);
        currentCenterLocation = userLocation;
        filterFarms(currentCenterLocation);
        document.getElementById('location-input').value = '';
    };

    const handleGeolocationError = () => {
        alert('現在地の取得に失敗しました。');
        showLoadingSpinner(false);
    };

    const setupDistanceChangeListener = () => {
        document.querySelectorAll('input[name="distance"]').forEach(element => {
            element.addEventListener('change', () => {
                if (currentCenterLocation) {
                    showLoadingSpinner(false);
                    filterFarms(currentCenterLocation);
                }
            });
        });
    };

    const filterFarms = (centerLocation) => {
        const farmListDiv = document.getElementById('farm_list');
        farmListDiv.innerHTML = '検索中...';

        const selectedDistance = document.querySelector('input[name="distance"]:checked').value;
        const apiUrl = `${restUrl}?latitude=${centerLocation.lat}&longitude=${centerLocation.lng}&distance=${selectedDistance}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(html => {
                farmListDiv.innerHTML = html;
                showLoadingSpinner(false);
            })
            .catch(error => {
                console.error('Error fetching nearby farms:', error);
                farmListDiv.innerHTML = '農園情報の取得に失敗しました。';
                showLoadingSpinner(false);
            });
    };

    const showLoadingSpinner = (show) => {
        const overlay = document.getElementById('loading-overlay');
        const mapScale = document.getElementById('map_scale');
        overlay.style.display = show ? 'flex' : 'none';
        if (show) mapScale.style.display = 'flex';
    };

    window.addEventListener('load', initMap);

    // エラーハンドリング
    window.addEventListener('error', (e) => {
        if (e.target.src && e.target.src.includes('maps.googleapis.com')) {
            alert('Google Mapsの読み込みに失敗しました。インターネット接続を確認してください。');
        }
    });
});
