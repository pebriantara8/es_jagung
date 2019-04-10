  <script>
    var myData = 
    <?php echo $list_selisih_presensi_harian; ?>
    // [24, 68, 48, 70, 400, 15, 30];

    var myConfig = {
      "graphset": [{
        "type": "bar",
        "title": {
          "text": "Weekly Summary"
        },
        "scale-x": {
          "labels": 
          <?php echo $list_date_chart; ?>
          // [
          	// "Webster", "Parnel", "Dena", "Tyrell", "Martha", "Summer", "Linton"
          // ]
        },
        "series": [{
          "values": myData
        }]
      }]
    };

    zingchart.render({
      id: 'chart_presensi',
      data: myConfig,
      height: "100%",
      width: "100%"
    });
  </script>