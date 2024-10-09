/* -------------------------------------------------------------------------------------

	見学のお申し込み　送信完了MAP表示

-------------------------------------------------------------------------------------- */

function googleMap() {
    var latlng = new google.maps.LatLng(34.783876, 135.531043);/* 座標 */
    var myOptions = {
        zoom: 18, /*拡大比率*/
        center: latlng, /*表示枠内の中心点*/
        mapTypeControl: false,
        scrollwheel:false,
        mapTypeId: google.maps.MapTypeId.ROADMAP/*表示タイプの指定*/
    };
    var map = new google.maps.Map(document.getElementById('map'), myOptions);

    /*アイコン設定*/
    var icon = new google.maps.MarkerImage('../common/img/map_icon.png',/*画像url*/
        new google.maps.Size(56,80),/*アイコンサイズ*/
        new google.maps.Point(0,0)/*アイコン位置*/
    );
    var markerOptions = {
        position: latlng,
        map: map,
        icon: icon,
        title: 'アクセスマップ',/*タイトル*/
        animation: google.maps.Animation.DROP/*アニメーション*/
    };
    var marker = new google.maps.Marker(markerOptions);
    var mapType = new google.maps.StyledMapType(mapStyle);
    map.mapTypes.set('GrayScaleMap', mapType);
    map.setMapTypeId('GrayScaleMap');
};

google.maps.event.addDomListener(window, 'load', function() {
    googleMap();

});

/* -------------------------------------------------------------------------------------

	農園詳細MAP表示

-------------------------------------------------------------------------------------- */

function googleMap() {
    var latlng = new google.maps.LatLng(34.783876, 135.531043);/* 座標 */
    var myOptions = {
        zoom: 18, /*拡大比率*/
        center: latlng, /*表示枠内の中心点*/
        mapTypeControl: false,
        scrollwheel:false,
        mapTypeId: google.maps.MapTypeId.ROADMAP/*表示タイプの指定*/
    };
    var map = new google.maps.Map(document.getElementById('s-map'), myOptions);

    /*アイコン設定*/
    var icon = new google.maps.MarkerImage('../common/img/map_icon.png',/*画像url*/
        new google.maps.Size(56,80),/*アイコンサイズ*/
        new google.maps.Point(0,0)/*アイコン位置*/
    );
    var markerOptions = {
        position: latlng,
        map: map,
        icon: icon,
        title: 'アクセスマップ',/*タイトル*/
        animation: google.maps.Animation.DROP/*アニメーション*/
    };
    var marker = new google.maps.Marker(markerOptions);
    var mapType = new google.maps.StyledMapType(mapStyle);
    map.mapTypes.set('GrayScaleMap', mapType);
    map.setMapTypeId('GrayScaleMap');
};

google.maps.event.addDomListener(window, 'load', function() {
    googleMap();

});


/* -------------------------------------------------------------------------------------

	地域から農園をさがすMAP表示

-------------------------------------------------------------------------------------- */

!function() {
  // ピン(マーカー)のデータ
  var myMarkers = [
    {
      position: [35.807508, 139.941723],
      title: '松戸農園',
      content: '<div class="pins"><dl><dt><img src="../common/img/pin-sampic.jpg" alt=""/></dt><dd>肥沃な土質なので、果菜類やにんじんなど、どんな野菜もお勧め！</dd><dd class="orange-btn"><a href="#">詳細はこちら</a></dd></dl></div>'
		
    },
    {
      position: [35.7395, 139.945181],
      title: '市川農園',
      content: '<div class="pins"><dl><dt><img src="../common/img/pin-sampic.jpg" alt=""/></dt><dd>肥沃な土質なので、果菜類やにんじんなど、どんな野菜もお勧め！</dd><dd class="orange-btn"><a href="#">詳細はこちら</a></dd></dl></div>'
    },
    {
      position: [35.752439, 139.932836],
      title: '八千代農園',
      content: '<div class="pins"><dl><dt><img src="../common/img/pin-sampic.jpg" alt=""/></dt><dd>肥沃な土質なので、果菜類やにんじんなど、どんな野菜もお勧め！</dd><dd class="orange-btn"><a href="#">詳細はこちら</a></dd></dl></div>'
    },
    {
      position: [35.825939, 139.993947],
      title: '松戸高七園農園',
      content: '<div class="pins"><dl><dt><img src="../common/img/pin-sampic.jpg" alt=""/></dt><dd>肥沃な土質なので、果菜類やにんじんなど、どんな野菜もお勧め！</dd><dd class="orange-btn"><a href="#">詳細はこちら</a></dd></dl></div>'
    },
    {
      position: [35.732001, 139.943801],
      title: '柏農園',
      content: '<div class="pins"><dl><dt><img src="../common/img/pin-sampic.jpg" alt=""/></dt><dd>肥沃な土質なので、果菜類やにんじんなど、どんな野菜もお勧め！</dd><dd class="orange-btn"><a href="#">詳細はこちら</a></dd></dl></div>'
    }
  ];

  function initialize() {
    var myLatlng = new google.maps.LatLng(35.807508, 139.941723);

    /*アイコン設定*/
    var icon = new google.maps.MarkerImage('../common/img/map_icon.png',/*画像url*/
        new google.maps.Size(56,80),/*アイコンサイズ*/
        new google.maps.Point(0,0)/*アイコン位置*/
    );


    // Map Options
    var mapOptions = {
      center: myLatlng,
      zoom: 12,
      mapTypeControl: false,  // 地図や航空写真 の切り替え 無効
      scaleControl: false,  //  スケールの表示 無効
      streetViewControl: false,  // ストリートビュー 無効
      rotateControl: false  // 回転コントロールの表示 無効
    };

    // Map
    var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

    // Info Window
    var infowindow;

    // show Information Window Event
    var showInfoWindow = function(markerObj) {
      if(infowindow) {
        infowindow.close();
      }
      var content = '<strong>' + markerObj.getTitle() + '</strong><br />' + markerObj.content;
      infowindow = new google.maps.InfoWindow({
        content: content
      });
      return infowindow.open(map, markerObj);
    };

    // Add markers
    for(var i=0, l=myMarkers.length; i<l; i+=1) {
      var markerData = myMarkers[i],
          marker = new google.maps.Marker({
            position: new google.maps.LatLng( markerData.position[0], markerData.position[1] ),
            title: markerData.title,
            content: markerData.content,
            icon: icon,
            map: map
          });

      // addListener
      google.maps.event.addListener(marker, 'click', function() {
        showInfoWindow(this);
      });
    }
  }

  google.maps.event.addDomListener(window, 'load', initialize);
}();