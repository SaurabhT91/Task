<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/scroller/2.1.1/css/scroller.jqueryui.min.css">

    <title>Document</title>

</head>

<body>
    <style type="text/css">
        img {
            width: 50px;
            height: 50px;
        }
    </style>
    <table id="table" class="display" style="width:100%;max-width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th>Guid</th>
                <th>Publish Date</th>
                <th>Author</th>
                <th>Enclosure</th>
            </tr>
        </thead>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.jqueryui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.1.1/js/dataTables.scroller.min.js"></script>

    <script>
        const tableData = {{ Js::from($data) }};
        $(document).ready(function() {
            $('#table').DataTable({
                searchBuilder: {liveSearch: false},
                responsive: true,
                scroller: false,
                data: tableData,
                columns: [
                    { data: 'id' },
                    { data: 'title'},
                    { data: 'description'},
                    { data: 'link' },
                    { data: 'guid' },
                    { data: 'publish_date' },
                    { data: 'creator' },
                    { data: 'enclosure' },
                ]
            })
        });
    </script>
</body>
</html>
