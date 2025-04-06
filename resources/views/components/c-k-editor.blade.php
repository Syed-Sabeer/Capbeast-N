<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      ClassicEditor
        .create(document.querySelector('#description'), {
          toolbar: [
            'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontColor', 'fontBackgroundColor', '|',
            'link', 'numberedList', '', '|',
            'undo', 'redo'
          ]
        })
        .then(editor => {
          document.querySelector('form').addEventListener('submit', function (event) {
            if (!editor.getData().trim()) {
              alert('Description is required!');
              event.preventDefault();
            }
          });
        })
        .catch(error => console.error('CKEditor initialization error:', error));
    });
  </script>
<style>
    /* Change CKEditor toolbar icons color to white */
.ck-toolbar .ck-button {
  color: white !important;
}

/* Change active and focused button colors */
.ck-toolbar .ck-button.ck-on,
.ck-toolbar .ck-button:focus {
  background-color: transparent !important; /* Remove hover effect */
  box-shadow: none !important; /* Remove focus effect */
}

/* Change toolbar background color */
.ck-toolbar {
  background-color: #434968 !important;
  border-radius: 5px;
}

/* Adjust editor area background and text color */
.ck-editor__editable {
  min-height: 200px;
  border-radius: 5px;
  background-color: #2F3349 !important;
  color: #ffffff !important;
}
/* Remove hover effect from CKEditor toolbar buttons */
.ck-toolbar .ck-button:hover {
  background-color: transparent !important;
}
/* Change Select2 dropdown background and text color */
.select2-container--default .select2-selection--single {
  background-color: #2F3349 !important; /* Dark background */
  color: #ffffff !important; /* White text */
  border: 1px solid #6c757d !important; /* Border color */
}

/* Style the dropdown options */
.select2-container--default .select2-results__option {
  background-color: #2F3349 !important; /* Dark background */
  color: #ffffff !important; /* White text */
}

/* Change hover effect */
.select2-container--default .select2-results__option--highlighted {
  background-color: #6c757d !important; /* Highlight color */
}
/* CKEditor dropdown background and text color */
.ck.ck-dropdown__panel {
  background-color: #2F3349 !important; /* Dark background */
  color: #ffffff !important; /* White text */
  border: 1px solid #6c757d !important; /* Border color */
}

/* Style CKEditor dropdown options */
.ck.ck-list__item {
  background-color: #2F3349 !important;
  color: #ffffff !important;
}

/* Highlight dropdown option on hover */
.ck.ck-list__item:hover {
  background-color: #6c757d !important;
}

</style>