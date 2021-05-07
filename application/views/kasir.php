<body>
	//start script for webix ui
    <script type="text/javascript" charset="utf-8">
        var formData = {
            rows: [{

                autoheight: false,
                view: "form",
                id: "data_barang",
                width: 450,
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
                        view: "list",
                        data: ""
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
                "type": {
                    "height": 100
                },
                "url": "<?= base_url('Crud') ?>",
                "template": "<b>#nama_barang#</b> <br> #harga#/#kuantitas#",
                "view": "dataview",
                select: true,
                on: {
                    onAfterSelect: valuesToForm
                }
            }]
        };
        webix.ready(function() {

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
            if (barang_data.id) {
                tabel.updateItem(barang_data.id, barang_data);
                $.ajax({
                    type: "POST",
                    data: barang_data,
                    url: "<?= base_url('Crud/save') ?>"
                })
            } else {
                $.ajax({
                    type: "POST",
                    data: barang_data,
                    url: "<?= base_url('Crud/save') ?>"
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
