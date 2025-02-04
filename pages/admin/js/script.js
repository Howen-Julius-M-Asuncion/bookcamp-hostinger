// Pagination function
var displayTable = new DataTable('#display-table', {
    info: true,
    paging: true,
    responsive: true,
    fixedHeader: true,
    language: { 
        search: "", 
        searchPlaceholder: "Search..." ,
        lengthMenu: "Show _MENU_ Entries",
    },
    columnDefs: [
        {
            orderable: false,
            render: DataTable.render.select(),
            targets: 0
        },
        {
            target: 0,
            visible: true,
            searchable: false
        }
    ],
    order: [[7, 'desc']],
    select: {
        style: 'single',
        // selector: 'td:first-child'
    }
});

displayTable.on('select', function(e, dt, type, indexes) {
    if (type === 'row') {
        // Row Selected
        var selectedRowData = displayTable.row(indexes).data();
        console.log("Selected row data:", selectedRowData);
        
        // Extract entry ID from the selected row data
        var entryID = selectedRowData[1];
        console.log("Selected ID:", entryID);

        // // Populate fields in modal edit
        // document.getElementById('edit_id').value = entryID;
        // document.getElementById('edit_email').value = selectedRowData[3];
        // document.getElementById('edit_first').value = selectedRowData[4].split(' ')[0];
        // document.getElementById('edit_last').value = selectedRowData[4].split(' ')[1];

        // var accountType = selectedRowData[5];
        // var accountTypeMap = {
        //     "Admin": 1,
        //     "Staff": 2,
        //     "Professor": 3,
        //     "Student": 4
        // };

        // // console.log("Account Type:", accountTypeMap[accountType]);

        // // Populate fields in modal delete confirmation
        // document.getElementById('delete_id').value = entryID;
        // document.getElementById('delete_email').value = selectedRowData[3];
        // document.getElementById('delete_first').value = selectedRowData[4].split(' ')[0];
        // document.getElementById('delete_last').value = selectedRowData[4].split(' ')[1];


        // if (accountTypeMap[accountType]) {
        //     $('#edit_type').val(accountTypeMap[accountType]).trigger('change');
        //     $('#delete_type').val(accountTypeMap[accountType]).trigger('change');
        // }
    }
});


// Action buttons
function toggleButtonState(buttonId) {
    var selectedRows = displayTable.rows({ selected: true }).count();
    var button = document.getElementById(buttonId);
    button.disabled = selectedRows === 0;
}

toggleButtonState('editEntryBtn');
toggleButtonState('deleteEntryBtn');

displayTable.on('select deselect', function () {
    toggleButtonState('editEntryBtn');
    toggleButtonState('deleteEntryBtn');
});

// Modal function
const addEntryButton = document.getElementById('addEntryBtn');
const addEntryModal = new bootstrap.Modal(document.getElementById('addEntryModal'));

const editEntryButton = document.getElementById('editEntryBtn');
const editEntryModal = new bootstrap.Modal(document.getElementById('editEntryModal'));

const deleteEntryButton = document.getElementById('deleteEntryBtn');
const deleteEntryModal = new bootstrap.Modal(document.getElementById('deleteEntryModal'));

addEntryButton.addEventListener('click', function(event) {
    event.preventDefault();
    addEntryModal.show();
});

editEntryButton.addEventListener('click', function(event) {
    event.preventDefault();
    editEntryModal.show();
});

deleteEntryButton.addEventListener('click', function(event) {
    event.preventDefault();
    deleteEntryModal.show();
});
