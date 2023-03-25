var quill = new Quill('#editor', {
    theme: 'snow',
     modules: {
        imageResize: {
          displaySize: true
        },
       toolbar: [
         [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
         ['bold', 'italic', 'underline', 'strike'],
         [{ 'color': [] }, { 'background': [] }], 
         [{ 'align': [] }],
         ['link', 'image']
       ]
    }
});