<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>/themes/default/js/dataTables.editor.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/themes/default/css/editor.dataTables.min.css">


	
	
	<script type="text/javascript">
		var editor; // use a global for the submit and return data rendering in the examples

		$(document).ready(function() {
			editor = new $.fn.dataTable.Editor({
				ajax: "<?php echo base_url()."index.php/employee/editEmployees" ?>",
				table: "#example",
				fields: [{
					label: "First name:",
					name: "first_name"
				}, {
					label: "Last name:",
					name: "last_name"
				}, {
					label: "Position:",
					name: "position"
				}, {
					label: "Office:",
					name: "office"
				}, {
					label: "Extension:",
					name: "extn",
					multiEditable: false
				}, {
					label: "Start date:",
					name: "start_date",
					type: "datetime"
				}, {
					label: "Salary:",
					name: "salary"
				}]
			});

			$('#example').DataTable({
				dom: "Bfrtip",
				ajax: "<?php echo base_url()."index.php/employee/getEmployees" ?>",
				columns: [{
						data: null,
						render: function(data, type, row) {
							return data.first_name + ' ' + data.last_name;
						}
					},
					{
						data: "position"
					},
					{
						data: "office"
					},
					{
						data: "extn"
					},
					{
						data: "start_date"
					},
					{
						data: "salary",
						render: $.fn.dataTable.render.number(',', '.', 0, '$')
					}
				],
				select: true,
				buttons: [{
						extend: "create",
						editor: editor
					},
					{
						extend: "edit",
						editor: editor
					},
					{
						extend: "remove",
						editor: editor
					}
				]
			});
		});
	</script>
</head>