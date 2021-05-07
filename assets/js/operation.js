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
                // click: s
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
        autoConfig: true,
        url: "<?php echo base_url('Crud') ?>", //load data
        on: {
            onAfterSelect: valuesToForm
        }
        // save: {
        //   "insert": "http://localhost/webixCRUD/data.json",
        //   "update": "http://localhost/webixCRUD/data.json",
        //   "delete": "http://localhost/webixCRUD/data.json"
        // }
    }]
};
webix.ready(function () {

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

    // $$("tabel_barang").load("http://localhost/webixCRUD/data.json");
});

function saveData() {
    var form = $$("data_barang");
    var tabel = $$("tabel_barang");
    var barang_data = form.getValues();
    if (barang_data.id) {
        tabel.updateItem(barang_data.id, barang_data);
        $.ajax({
            type: "POST",
            data: barang_data,
            url: "save-data.php"
        })
    } else {
        $.ajax({
            type: "POST",
            data: barang_data,
            url: "save-data.php"
        })
        tabel.add(barang_data);

    }

};

function deleteData() {
    var tabel = $$("tabel_barang");
    var form = $$("data_barang");
    var barang_data = form.getValues();
    var data_id = tabel.getSelectedId();
    if (data_id) {
        tabel.remove(data_id);
        $.ajax({
            type: 'POST',
            data: barang_data,
            url: "hapus-data.php"
            // dataType: JSON,
            // success: function(response) {
            //   if (response.status == '1') {
            //     alert(response.msg);
            //   } else {
            //     alert(response.msg);
            //   }
            // }
        })
        // webix.confirm("Delete selected item?", "confirm-warning").then(function() {

        // });
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