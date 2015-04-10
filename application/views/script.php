<script>
var editor; // use a global for the submit and return data rendering in the examples


$(document).ready(function() {
	editor = new $.fn.dataTable.Editor( {
		serverSide: true,
		ajax: "<?php echo site_url(); ?>/config/Tenant",
		table: "#example",
		idSrc: "id",
		fields: [ {
				label: "Company Name:",
				name: "Comapny_Name"
			},  {
				label: "Contact first name",
				name: "first_name"
			}, {
				label: "Contact last name",
				name: "last_name"
			},{
				label: "Contact Email Address ",
				name: "email"
			},{
				label: "Contact Password ",
				name: "password",
				type: "password"
			},{
				label: "Date:",
				name: "date",
				type: "date",
				def: function () { return new Date(); },
                dateFormat: $.datepicker.ISO_8601
			}
		],
		i18n: {
            create: {
                button: "Create",
                title:  "Create New ",
                submit: "Submit"
            },
            edit: {
                button: "Edit",
                title:  "Edit",
                submit: "Submit"
            },
            remove: {
                button: "Delete",
                title:  "Are you sure ",
                submit: "Submit",
                confirm: {
                    _: "Something goes wrong ,Please Refresh Page and try agian !",
                    1: "Are you sure you wish to delete 1 row?"
                }
            },
            error: {
                system: "Something goes wrong ,Please Refresh Page and try agian !"
            }
        }
  
	} );
	
	 editor.on( 'preSubmit', function ( e, o, action ) {
        if ( action !== 'remove' ) {
            if ( o.data.Comapny_Name === '' ) {
                this.error('Comapny_Name', 'A company name must be given');
                return false;
            }
			else if ( o.data.first_name === '' ) {
                this.error('first_name', 'A first name must be given');
                return false;
            }
            else if ( o.data.first_name.length >= 15) {
                this.error('first_name', 'The first name length must be less that 15 characters');
                return false;
            }
			else if ( o.data.last_name === '' ) {
                this.error('last_name', 'A lirst name must be given');
                return false;
            }
            else if ( o.data.last_name.length >= 15 ) {
                this.error('last_name', 'The lirst name length must be less that 15 characters');
                return false;
            }
			else if ( o.data.email === '' ) {
                this.error('email', 'A email must be given');
                return false;
            }
           
			else if ( o.data.password === '' ) {
                this.error('password', 'A password must be given');
                return false;
            }
            else if ( o.data.password.length <= 5) {
                this.error('password', 'The password length must be greater that 5 characters');
                return false;
            }
			
            // ... etc
        }
    } );
	$('#example').DataTable( {
		dom: "Tfrtip",
		ajax: "<?php echo site_url(); ?>/config/Tenant",
		columns: [
			{ data: null, render: function ( data, type, row ) {
				
				// Combine the first and last names into a single table field
				return data.first_name+" "+data.last_name;
			} },
			{ data: "Comapny_Name" },
			{ data: "date" }
		],
		tableTools: {
			sRowSelect: "os",
			aButtons: [
				{ sExtends: "editor_create", editor: editor },
				{ sExtends: "editor_edit",   editor: editor },
				{ sExtends: "editor_remove", editor: editor }
			]
		}
	} );
	
} );



	</script>