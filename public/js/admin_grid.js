var admincontroller = {
    
     workurl : '/admin/worklist',
     videourl : '/admin/videolist',
     subscribeurl : '/admin/subscribelist',
     graduateurl : '/admin/graduatelist',
     issueurl : '/admin/issuelist',
     joinusurl : '/admin/joinuslist',
     teamurl : '/admin/teamlist',
     presscoverageurl : '/admin/presscoveragelist',
     patravaharurl : '/admin/patravaharlist',
     press_notesurl : '/admin/press_noteslist',
     blogurl : '/admin/bloglist',
     culturaleventurl : '/admin/culturaleventlist',
     organizationurl : '/admin/organizationlist',

    organizationlist_grid : function(){
    var self = this;

    $(document).ready(function () {
        var rawurl= self.organizationurl;
        var fields=new Array('id','name','address','position','email','phone_no','work_image','state');
        var jqxgridid='#jqxgrid';
       
        var source =
        {
            datatype: "json",
            cache: false,
            datafields: [
                { name: 'id',type: 'number' },
                { name: 'name'},
                { name: 'address'},
                { name: 'position'},
                { name: 'email'},
                { name: 'phone_no' }, 
                { name: 'updated_at'} ,
                { name: 'work_image'} ,  
                { name: 'state'} ,  
            ],
            id: 'id',
            url: rawurl,
            root: 'Rows',
            beforeprocessing: function(data)
            {       
                source.totalrecords = data[0].TotalRows;
                
            },

            sort: function () {
            // update the grid and send a request to the server.
            $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },

            filter: function (rowid, rowdata) {
                // update the grid and send a reques,filterable:falset to the server.
                $(jqxgridid).jqxGrid('updatebounddata', 'filter');
            },
           
            updaterow: function (rowid, rowdata, commit) {
                //synchronize with the server - send update command
                var data = "update=true&" + $.param(rowdata);
                var id = rowdata.id;
            }
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        // initialize jqxGrid
        $(jqxgridid).jqxGrid(
        {
            width: '100%',
            height: 450,
            source: dataAdapter,
            theme: theme,
            editable: false,
            showfilterrow: false,
            filterable: true,
            sortable: true,
            pageable: true,
            pagesize: 50,
            pagesizeoptions: ['50', '100', '500','1000'],
            virtualmode: true,
            //selectionmode: 'checkbox',
            rendergridrows: function()
            {
                
                  return dataAdapter.records;     
            },
            columns: [
                { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                { text: 'Name', datafield: 'name', width: 200 , editable: false,filterable: false,},
                { text: 'Address', datafield: 'address', width: 80 , editable: false,filterable: false,},
                { text: 'Position', datafield: 'position', width: 150 , editable: false,filterable: false,},
                { text: 'Email', datafield: 'email', width: 150 , editable: false,filterable: false,},
                { text: 'Phone No', datafield: 'phone_no', width: 150 , editable: false,filterable: false, sortable: false,},
                { text: 'Image', datafield: 'images', width: 80 , editable: false,filterable: false,},
                { text: 'State', datafield: 'state_name', width: 400 , editable: false,filterable: false,},
                { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
      
            ]
        });

    //trigger filter on notification button click
    $('body').on('click','.notif-filter',function(){
        set_filter($(this).data('filtercol'),$(this).data('filterval'));
    });

    $('body').on('click','.reset-filter',function(){
        $(jqxgridid).jqxGrid('clearfilters');
    });
    function set_filter(colname,val){
            var searchText = val;
            // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
            var filtergroup = new $.jqx.filter();
            var filtervalue = searchText;
            var filtercondition = 'contains';
            var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
            // used when there are multiple filters on a grid column:
            var filter_or_operator = 1;
            // used when there are multiple filters on the grid:
            filtergroup.operator = 'or';
            filtergroup.addfilter(filter_or_operator, filter);
            //remove other filters
            $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
            $(jqxgridid).jqxGrid('applyfilters');     
    }            
    //trigger filter on notification button click
    }); // end document.ready func

    }, // end users br_grid func

    worklist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.workurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    { name: 'areaname'},
                    { name: 'type'},
                    { name: 'division'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    { name: 'description'} ,  
                    { name: 'mp_fund'} ,  
                    { name: 'position'} ,  
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'MP Fund', datafield: 'mp_fund', width: 80 , editable: false,filterable: false,},
                    { text: 'Work Area', datafield: 'areaname', width: 150 , editable: false,filterable: false,},
                    { text: 'Work Division', datafield: 'division', width: 150 , editable: false,filterable: false,},
                    { text: 'Work Type', datafield: 'type', width: 150 , editable: false,filterable: false,},
                    { text: 'Position', datafield: 'position', width: 80 , editable: false,filterable: false,},
                    { text: 'Description', datafield: 'description', width: 400 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    videolist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.videourl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    { name: 'videourl'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: false,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Video URL', datafield: 'videourl', width: 150 , editable: false,filterable: false,},
                    
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    subscribelist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.subscribeurl;
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'email'},
                    { name: 'created_at' },
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data){       
                    source.totalrecords = data[0].TotalRows;
                },
                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: false,
                showfilterrow: false,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                rendergridrows: function(){
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Email', datafield: 'email', width: 200 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    graduatelist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.graduateurl;
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'name'},
                    { name: 'email'},
                    { name: 'mobile'},
                    { name: 'constituency'},
                    { name: 'qualification'},
                    { name: 'created_at' },
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data){       
                    source.totalrecords = data[0].TotalRows;
                },
                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: false,
                showfilterrow: false,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                rendergridrows: function(){
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Name', datafield: 'name', width: 200 , editable: false,filterable: false,},
                    { text: 'Email', datafield: 'email', width: 200 , editable: false,filterable: false,},
                    { text: 'Mobile', datafield: 'mobile', width: 200 , editable: false,filterable: false,},
                    { text: 'Constitutency', datafield: 'constituency', width: 200 , editable: false,filterable: false,},
                    { text: 'Qualification', datafield: 'qualification', width: 200 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
          
                ]
            });

        //trigger filter on notification button click
        $('body').on('click','.notif-filter',function(){
            set_filter($(this).data('filtercol'),$(this).data('filterval'));
        });

        $('body').on('click','.reset-filter',function(){
            $(jqxgridid).jqxGrid('clearfilters');
        });

        function set_filter(colname,val){
            var searchText = val;
            // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
            var filtergroup = new $.jqx.filter();
            var filtervalue = searchText;
            var filtercondition = 'contains';
            var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
            // used when there are multiple filters on a grid column:
            var filter_or_operator = 1;
            // used when there are multiple filters on the grid:
            filtergroup.operator = 'or';
            filtergroup.addfilter(filter_or_operator, filter);
            //remove other filters
            $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
            $(jqxgridid).jqxGrid('applyfilters');     
        }            
        //trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func
    
    issuelist_grid : function(){
    var self = this;

    $(document).ready(function () {
        var rawurl= self.issueurl;
        var fields=new Array('id','name','topic','description','contact','state','district','mla','mp');
        var jqxgridid='#jqxgrid';
       
        var source =
        {
            datatype: "json",
            cache: false,
            datafields: [
                { name: 'id',type: 'number' },
                { name: 'name'},
                { name: 'topic'},
                { name: 'description'},
                { name: 'contact'},
                { name: 'state'},
                { name: 'district'},
                { name: 'mla'},
                { name: 'mp'},
                { name: 'created_at' }, 
                { name: 'updated_at'} ,
                
            ],
            id: 'id',
            url: rawurl,
            root: 'Rows',
            beforeprocessing: function(data)
            {       
                source.totalrecords = data[0].TotalRows;
                
            },

            sort: function () {
            // update the grid and send a request to the server.
            $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },

            filter: function (rowid, rowdata) {
                // update the grid and send a reques,filterable:falset to the server.
                $(jqxgridid).jqxGrid('updatebounddata', 'filter');
            },
           
            updaterow: function (rowid, rowdata, commit) {
                //synchronize with the server - send update command
                var data = "update=true&" + $.param(rowdata);
                var id = rowdata.id;
            }
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        // initialize jqxGrid
        $(jqxgridid).jqxGrid(
        {
            width: '100%',
            height: 450,
            source: dataAdapter,
            theme: theme,
            editable: false,
            showfilterrow: false,
            filterable: true,
            sortable: true,
            pageable: true,
            pagesize: 50,
            pagesizeoptions: ['50', '100', '500','1000'],
            virtualmode: true,
            //selectionmode: 'checkbox',
            rendergridrows: function()
            {
                
                  return dataAdapter.records;     
            },
            columns: [
                { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                { text: 'Name', datafield: 'name', width: 200 , editable: false,filterable: false,},
                { text: 'Topic', datafield: 'topic', width: 150 , editable: false,filterable: false,},
                { text: 'Description', datafield: 'description', width: 150 , editable: false,filterable: false,},
                { text: 'Contact', datafield: 'contact', width: 150 , editable: false,filterable: false, sortable: false,},
                { text: 'State', datafield: 'state', width: 150,filterable: false},
                { text: 'District', datafield: 'district', width: 150,filterable: false},
                { text: 'Mla Constitutency', datafield: 'mla', width: 150,filterable: false},
                { text: 'Mp Constitutency', datafield: 'mp', width: 150,filterable: false},
                { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},      
            ]
        });

    //trigger filter on notification button click
    $('body').on('click','.notif-filter',function(){
        set_filter($(this).data('filtercol'),$(this).data('filterval'));
    });

    $('body').on('click','.reset-filter',function(){
        $(jqxgridid).jqxGrid('clearfilters');
    });

    function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
    }            
}); // end document.ready func

}, // end users br_grid func


joinuslist_grid : function(){
    var self = this;

    $(document).ready(function () {
        var rawurl= self.joinusurl;
        var fields=new Array('id','name','contact','state','district','mla','mp');
        var jqxgridid='#jqxgrid';
       
        var source =
        {
            datatype: "json",
            cache: false,
            datafields: [
                { name: 'id',type: 'number' },
                { name: 'name'},
                { name: 'contact',type: 'number'},
                { name: 'state'},
                { name: 'district'},
                { name: 'mla'},
                { name: 'mp'},
                { name: 'created_at' },                
            ],
            id: 'id',
            url: rawurl,
            root: 'Rows',
            beforeprocessing: function(data)
            {       
                source.totalrecords = data[0].TotalRows;
                
            },

            sort: function () {
            // update the grid and send a request to the server.
            $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
            },

            filter: function (rowid, rowdata) {
                // update the grid and send a reques,filterable:falset to the server.
                $(jqxgridid).jqxGrid('updatebounddata', 'filter');
            },
           
            updaterow: function (rowid, rowdata, commit) {
                //synchronize with the server - send update command
                var data = "update=true&" + $.param(rowdata);
                var id = rowdata.id;
            }
        };

        var dataAdapter = new $.jqx.dataAdapter(source);

        // initialize jqxGrid
        $(jqxgridid).jqxGrid(
        {
            width: '100%',
            height: 450,
            source: dataAdapter,
            theme: theme,
            editable: true,
            showfilterrow: false,
            filterable: false,
            sortable: true,
            pageable: true,
            pagesize: 50,
            pagesizeoptions: ['50', '100', '500','1000'],
            virtualmode: true,
            //selectionmode: 'checkbox',
            rendergridrows: function()
            {
                
                  return dataAdapter.records;     
            },
            columns: [
                { text: 'ID', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                { text: 'Name', datafield: 'name', width: 150 , editable: false,filterable: false},
                { text: 'Contact', datafield: 'contact', width: 150, editable: false, filterable: false},
                { text: 'State', datafield: 'state', width: 150,filterable: false, editable: false,},
                { text: 'District', datafield: 'district', width: 150,filterable: false, editable: false,},
                { text: 'Mla Constitutency', datafield: 'mla', width: 150,filterable: false, editable: false,},
                { text: 'Mp Constitutency', datafield: 'mp', width: 150,filterable: false, editable: false,},
                { text: 'Created At', datafield: 'created_at', width: 150, filtercondition : 'CONTAINS', editable: false,filterable: false},      
            ]
        });

    //trigger filter on notification button click
    $('body').on('click','.notif-filter',function(){
        set_filter($(this).data('filtercol'),$(this).data('filterval'));
    });

    $('body').on('click','.reset-filter',function(){
        $(jqxgridid).jqxGrid('clearfilters');
    });

    function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
    }            
}); // end document.ready func

}, // end users br_grid func

    teamlist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.teamurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'name'},
                    { name: 'position_title'},
                    { name: 'mobile'},
                    { name: 'address'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    { name: 'facebook'} ,
                    { name: 'twitter'} ,  
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: false,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Name', datafield: 'name', width: 200 , editable: false,filterable: false,},
                    { text: 'Position', datafield: 'position_title', width: 150 , editable: false,filterable: false,},
                    { text: 'Mobile', datafield: 'mobile', width: 150 , editable: false,filterable: false,},
                    { text: 'Address', datafield: 'address', width: 150 , editable: false,filterable: false,},
                    { text: 'Facebook', datafield: 'facebook', width: 200 , editable: false,filterable: false,},
                    { text: 'Twitter', datafield: 'twitter', width: 200 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    presscoveragelist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.presscoverageurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                   
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    patravaharlist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.patravaharurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                   
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func


    press_noteslist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.press_notesurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    { name: 'description'} ,  
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Description', datafield: 'description', width: 400 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    bloglist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.blogurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    { name: 'description'} ,  
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Description', datafield: 'description', width: 400 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

    culturaleventlist_grid : function(){
        var self = this;

        $(document).ready(function () {
            var rawurl= self.culturaleventurl;
            var fields=new Array('id','phone','name','email');
            var jqxgridid='#jqxgrid';
           
            var source =
            {
                datatype: "json",
                cache: false,
                datafields: [
                    { name: 'id',type: 'number' },
                    { name: 'title'},
                    { name: 'created_at' }, 
                    { name: 'updated_at'} ,
                    { name: 'description'} ,  
                ],
                id: 'id',
                url: rawurl,
                root: 'Rows',
                beforeprocessing: function(data)
                {       
                    source.totalrecords = data[0].TotalRows;
                    
                },

                sort: function () {
                // update the grid and send a request to the server.
                $("#jqxgrid").jqxGrid('updatebounddata', 'sort');
                },

                filter: function (rowid, rowdata) {
                    // update the grid and send a reques,filterable:falset to the server.
                    $(jqxgridid).jqxGrid('updatebounddata', 'filter');
                },
               
                updaterow: function (rowid, rowdata, commit) {
                    //synchronize with the server - send update command
                    var data = "update=true&" + $.param(rowdata);
                    var id = rowdata.id;
                }
            };

            var dataAdapter = new $.jqx.dataAdapter(source);

            // initialize jqxGrid
            $(jqxgridid).jqxGrid(
            {
                width: '100%',
                height: 450,
                source: dataAdapter,
                theme: theme,
                editable: true,
                showfilterrow: true,
                filterable: true,
                sortable: true,
                pageable: true,
                pagesize: 50,
                pagesizeoptions: ['50', '100', '500','1000'],
                virtualmode: true,
                //selectionmode: 'checkbox',
                rendergridrows: function()
                {
                    
                      return dataAdapter.records;     
                },
                columns: [
                    { text: 'Id', datafield: 'id', width: 50 ,filtercondition : 'EQUAL', editable: false,filterable: false},
                    { text: 'Title', datafield: 'title', width: 200 , editable: false,filterable: false,},
                    { text: 'Description', datafield: 'description', width: 400 , editable: false,filterable: false,},
                    { text: 'Created At', datafield: 'created_at', width: 130, filtercondition : 'CONTAINS', editable: false,filterable: false,},
                    { text: 'Updated At', datafield: 'updated_at', width: 130,  filtercondition : 'CONTAINS',editable: false,filterable: false,},
          
                ]
            });

//trigger filter on notification button click
$('body').on('click','.notif-filter',function(){
    set_filter($(this).data('filtercol'),$(this).data('filterval'));
});

$('body').on('click','.reset-filter',function(){
    $(jqxgridid).jqxGrid('clearfilters');
});

function set_filter(colname,val){
        var searchText = val;
        // $("#jqxgrid").jqxGrid('removefilter', 'firstname');
        var filtergroup = new $.jqx.filter();
        var filtervalue = searchText;
        var filtercondition = 'contains';
        var filter = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
        // used when there are multiple filters on a grid column:
        var filter_or_operator = 1;
        // used when there are multiple filters on the grid:
        filtergroup.operator = 'or';
        filtergroup.addfilter(filter_or_operator, filter);
        //remove other filters
        $(jqxgridid).jqxGrid('addfilter', colname, filtergroup);
        $(jqxgridid).jqxGrid('applyfilters');     
}            
//trigger filter on notification button click
        }); // end document.ready func

    }, // end users br_grid func

 
}

