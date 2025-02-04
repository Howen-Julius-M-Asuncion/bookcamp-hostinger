displayTable.on('select', function(e, dt, type, indexes) {
    if (type === 'row') {
        // Row Selected
        var selectedRowData = displayTable.row(indexes).data();
        console.log("Selected row data:", selectedRowData);
                
        // Extract entry ID from the selected row data
        var entryID = selectedRowData[1];
        console.log("Selected ID:", entryID);
        
        // Populate fields in modal edit
        document.getElementById('edit_id').value = entryID;
        document.getElementById('edit_title').value = selectedRowData[2];
        document.getElementById('edit_ISBN').value = selectedRowData[3];
        document.getElementById('edit_genre').value = selectedRowData[4];
        document.getElementById('edit_name').value = selectedRowData[5];

        // // Populate fields in modal delete confirmation
        document.getElementById('delete_id').value = entryID;
        document.getElementById('delete_title').value = selectedRowData[2];
        document.getElementById('delete_ISBN').value = selectedRowData[3];
        document.getElementById('delete_genre').value = selectedRowData[4];
        document.getElementById('delete_name').value = selectedRowData[5];
        
    }
});
