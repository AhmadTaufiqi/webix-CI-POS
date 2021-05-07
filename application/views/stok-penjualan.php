<body>

  <script type="text/javascript" charset="utf-8">
    var formData = {
      rows: [{

        autoheight: false,
        view: "form",
        id: "data_barang",
        width: 250,
        rows: [{
            cols: [{
                label: "masukkan data",
                view: "label"
              },
              {
                view: "button",
                label: "reset",
                type: "icon",
                icon: "wxi-pencil",
                value: "Clear",
                click: clearForm
              }
            ]

          },
          {
            view: "text",
            label: "Nama Brg",
            name: "nama_barang",
            placeholder: "(barang)"
          },
          {
            view: "text",
            label: "Kode Brg",
            name: "kode_barang",
            type: "number",
            placeholder: "(number)"
          },
          {
            view: "text",
            label: "Tipe",
            name: "kuantitas",
            placeholder: "(kilogram/pcs)"
          },
          {
            view: "text",
            type: "number",
            label: "Harga",
            name: "harga",
            placeholder: "(rupiah)"
          },
          {
            view: "text",
            type: "number",
            label: "Stock",
            name: "stock",
            placeholder: "pcs"
          },
          {
            "cols": [{
                view: "button",
                css: "webix_primary",
                id: "btn_save",
                label: "Save",
                click: "saveData()"
              },
              {
                view: "button",
                css: "webix_danger",
                id: "btn_delete",
                label: "delete",
                click: "deleteData()"
              }
            ]
          }
        ]
      }]
    };

    var dataTabels = {
      "rows": [{
        view: "datatable",
        id: "tabel_barang",
        autoConfig: true, //load data
        // url: "",
        on: {
          onAfterSelect: valuesToForm
        }
      }]
    };
    webix.ready(function() {
      $$('tabel_barang').load('<?= base_url('Crud') ?>')
      webix.ui({
        "rows": [{
            "cols": [
              // di isi form
              formData,
              dataTabels
              // di isi tabel
            ],
            "id": 1616245595885
          },
          {
            "view": "template",
            "template": "Footer ",
            "role": "placeholder",
            "height": 50,
            "id": 1616245595888
          }
        ],
        "id": 1616245595883
      });
    });


    function saveData() {
      var form = $$("data_barang");
      var tabel = $$("tabel_barang");
      var barang_data = form.getValues();
      console.log(barang_data);
      if (barang_data.id) {
        tabel.updateItem(barang_data.id, barang_data);
        webix.ajax().post("<?= base_url('Crud/save') ?>", barang_data)
      } else {
        webix.ajax().post("<?= base_url('Crud/save') ?>", barang_data)
        tabel.add(barang_data);
      }
    };

    function deleteData() {
      var tabel = $$("tabel_barang");
      var form = $$("data_barang");
      var barang_data = form.getValues();
      var data_id = tabel.getSelectedId();
      if (data_id) {
        webix.confirm("Delete selected item?", "confirm-warning").then(function() {
          tabel.remove(data_id);
        });
        $.ajax({
          type: 'POST',
          data: barang_data,
          url: "<?= base_url('Crud/hapus') ?>"
        })
      }
    };

    function clearForm() {
      $$("data_barang").clear();
      $$("tabel_barang").unselectAll();
    };

    function valuesToForm(id) {
      var values = $$("tabel_barang").getItem(id);
      $$("data_barang").setValues(values)
    };
  </script>
</body>

</html>