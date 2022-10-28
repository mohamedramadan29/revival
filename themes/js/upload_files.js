/** @format */

//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);
//document.addEventListener("DOMContentLoaded", init2, false);

//To save an array of attachments
var AttachmentArray = [];
var AttachmentArray2 = [];
var AttachmentArray3 = [];
var AttachmentArray4 = [];
var AttachmentArray5 = [];
var AttachmentArray6 = [];
var AttachmentArray7 = [];
var AttachmentArray8 = [];
var AttachmentArray9 = [];
var AttachmentArray10 = [];

//counter for attachment array
var arrCounter = 0;
var arrCounter2 = 0;
var arrCounter3 = 0;
var arrCounter4 = 0;
var arrCounter5 = 0;
var arrCounter6 = 0;
var arrCounter7 = 0;
var arrCounter8 = 0;
var arrCounter9 = 0;
var arrCounter10 = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

var ul2 = document.createElement("ul");
ul2.className = "thumb-Images";
ul2.id = "imgList2";
var ul3 = document.createElement("ul");
ul3.className = "thumb-Images";
ul3.id = "imgList3";
var ul4 = document.createElement("ul");
ul4.className = "thumb-Images";
ul4.id = "imgList4";
var ul5 = document.createElement("ul");
ul5.className = "thumb-Images";
ul5.id = "imgList5";
var ul6 = document.createElement("ul");
ul6.className = "thumb-Images";
ul6.id = "imgList6";
var ul7 = document.createElement("ul");
ul7.className = "thumb-Images";
ul7.id = "imgList7";
var ul8 = document.createElement("ul");
ul8.className = "thumb-Images";
ul8.id = "imgList8";
var ul9 = document.createElement("ul");
ul9.className = "thumb-Images";
ul9.id = "imgList9";

var ul10 = document.createElement("ul");
ul10.className = "thumb-Images";
ul10.id = "imgList10";
function init() {
  //add javascript handlers for the file upload event
  document
    .querySelector("#files")
    .addEventListener("change", handleFileSelect, false);
  document
    .querySelector("#files2")
    .addEventListener("change", handleFileSelect2, false);
  document
    .querySelector("#files3")
    .addEventListener("change", handleFileSelect3, false);
  document
    .querySelector("#files4")
    .addEventListener("change", handleFileSelect4, false);
  document
    .querySelector("#files5")
    .addEventListener("change", handleFileSelect5, false);
  document
    .querySelector("#files6")
    .addEventListener("change", handleFileSelect6, false);
  document
    .querySelector("#files7")
    .addEventListener("change", handleFileSelect7, false);
  document
    .querySelector("#files8")
    .addEventListener("change", handleFileSelect8, false);
  document
    .querySelector("#files9")
    .addEventListener("change", handleFileSelect9, false);
    document
    .querySelector("#files10")
    .addEventListener("change", handleFileSelect10, false);
}
function init2() {
  //add javascript handlers for the file upload event
}
//the handler for file upload event
function handleFileSelect(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt);

        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt);

        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }
  document
    .getElementById("files")
    .addEventListener("change", handleFileSelect, false);
}

//the handler for file upload event
function handleFileSelect2(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files2 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files2[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt2) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt2);

        //Render attachments thumbnails.

        RenderThumbnail2(e, readerEvt2);

        //Fill the array of attachment
        FillAttachmentArray2(e, readerEvt2);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files2")
    .addEventListener("change", handleFileSelect2, false);
}

function handleFileSelect3(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files3 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files3[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt3) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt3);

        //Render attachments thumbnails.

        RenderThumbnail3(e, readerEvt3);

        //Fill the array of attachment
        FillAttachmentArray3(e, readerEvt3);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files3")
    .addEventListener("change", handleFileSelect3, false);
}

function handleFileSelect4(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files4 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files4[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt4) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt4);

        //Render attachments thumbnails.

        RenderThumbnail4(e, readerEvt4);

        //Fill the array of attachment
        FillAttachmentArray4(e, readerEvt4);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files4")
    .addEventListener("change", handleFileSelect4, false);
}

function handleFileSelect5(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files5 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files5[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt5) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt5);

        //Render attachments thumbnails.

        RenderThumbnail5(e, readerEvt5);

        //Fill the array of attachment
        FillAttachmentArray5(e, readerEvt5);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files5")
    .addEventListener("change", handleFileSelect5, false);
}

function handleFileSelect6(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files6 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files6[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt6) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt6);

        //Render attachments thumbnails.

        RenderThumbnail6(e, readerEvt6);

        //Fill the array of attachment
        FillAttachmentArray6(e, readerEvt6);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files6")
    .addEventListener("change", handleFileSelect6, false);
}

function handleFileSelect7(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files7 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files7[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt7) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt7);

        //Render attachments thumbnails.

        RenderThumbnail7(e, readerEvt7);

        //Fill the array of attachment
        FillAttachmentArray7(e, readerEvt7);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files7")
    .addEventListener("change", handleFileSelect7, false);
}

function handleFileSelect8(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files8 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files8[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt8) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt8);

        //Render attachments thumbnails.

        RenderThumbnail8(e, readerEvt8);

        //Fill the array of attachment
        FillAttachmentArray8(e, readerEvt8);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files8")
    .addEventListener("change", handleFileSelect8, false);
}
function handleFileSelect9(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files9 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files9[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt9) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt9);

        //Render attachments thumbnails.

        RenderThumbnail9(e, readerEvt9);

        //Fill the array of attachment
        FillAttachmentArray9(e, readerEvt9);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files9")
    .addEventListener("change", handleFileSelect9, false);
}
function handleFileSelect10(e) {
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files10 = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files10[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function (readerEvt10) {
      return function (e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt10);

        //Render attachments thumbnails.

        RenderThumbnail10(e, readerEvt10);

        //Fill the array of attachment
        FillAttachmentArray10(e, readerEvt10);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }

  document
    .getElementById("files10")
    .addEventListener("change", handleFileSelect10, false);
}
//To remove attachment once user click on x button
jQuery(function ($) {
  $("div").on("click", ".img-wrap .close", function () {
    var id = $(this).closest(".img-wrap").find("img").data("id");

    //to remove the deleted item from array
    var elementPos = AttachmentArray.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArray.splice(elementPos, 1);
    }
    var elementPos2 = AttachmentArray2.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos2 !== -1) {
      AttachmentArray2.splice(elementPos2, 1);
    }
    var elementPos3 = AttachmentArray3.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos3 !== -1) {
      AttachmentArray3.splice(elementPos3, 1);
    }
    var elementPos4 = AttachmentArray4.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos4 !== -1) {
      AttachmentArray4.splice(elementPos4, 1);
    }
    var elementPos5 = AttachmentArray5.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos5 !== -1) {
      AttachmentArray5.splice(elementPos5, 1);
    }
    var elementPos6 = AttachmentArray6.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos6 !== -1) {
      AttachmentArray6.splice(elementPos6, 1);
    }
    var elementPos7 = AttachmentArray7.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos7 !== -1) {
      AttachmentArray7.splice(elementPos7, 1);
    }
    var elementPos8 = AttachmentArray8.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos8 !== -1) {
      AttachmentArray8.splice(elementPos8, 1);
    }
    var elementPos9 = AttachmentArray9.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos9 !== -1) {
      AttachmentArray9.splice(elementPos9, 1);
    }
    var elementPos10 = AttachmentArray10.map(function (x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos10 !== -1) {
      AttachmentArray10.splice(elementPos10, 1);
    } 
    

    //to remove image tag
    $(this).parent().find("img").not().remove();

    //to remove div tag that contain the image
    $(this).parent().find("div").not().remove();

    //to remove div tag that contain caption name
    $(this).parent().parent().find("div").not().remove();

    //to remove li tag
    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList2 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList3 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList4 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList5 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList6 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList7 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList8 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList9 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
    var lis = document.querySelectorAll("#imgList10 li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
  });
});

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt2) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt2.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt3) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt3.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt4) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt4.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt5) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt5.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt6) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt6.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt7) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt7.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt8) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt8.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}

function ApplyFileValidationRules(readerEvt9) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt9.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
function ApplyFileValidationRules(readerEvt10) {
  //To check file type according to upload conditions

  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt10.size) == false) {
    alert(
      " حجم الملف كبير جدا يجب الا يتجاوز 100 m  "
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
}
//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/gif") {
    return true;
  } else if (fileType == "mp4") {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
  if (fileSize < 102400000) {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount2(AttachmentArray2) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray2.length; i++) {
    if (AttachmentArray2[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount3(AttachmentArray3) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray3.length; i++) {
    if (AttachmentArray3[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount4(AttachmentArray4) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray4.length; i++) {
    if (AttachmentArray4[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount5(AttachmentArray5) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray5.length; i++) {
    if (AttachmentArray5[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount6(AttachmentArray6) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray6.length; i++) {
    if (AttachmentArray6[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount7(AttachmentArray7) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray7.length; i++) {
    if (AttachmentArray7[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount8(AttachmentArray8) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray8.length; i++) {
    if (AttachmentArray8[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount9(AttachmentArray9) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray9.length; i++) {
    if (AttachmentArray9[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
function CheckFilesCount10(AttachmentArray10) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray10.length; i++) {
    if (AttachmentArray10[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 5) {
    return false;
  } else {
    return true;
  }
}
//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt) {
  var li = document.createElement("li");
  ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt.name].join("");
  document.getElementById("image-gallery").insertBefore(ul, null);
}

//Render attachments thumbnails.
function RenderThumbnail2(e, readerEvt2) {
  var li = document.createElement("li");
  ul2.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt2.name),
    '" data-id="',
    readerEvt2.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt2.name].join("");
  document.getElementById("image-gallery2").insertBefore(ul2, null);
}
//Render attachments thumbnails.
function RenderThumbnail3(e, readerEvt3) {
  var li = document.createElement("li");
  ul3.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt3.name),
    '" data-id="',
    readerEvt3.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt3.name].join("");
  document.getElementById("image-gallery3").insertBefore(ul3, null);
}
//Render attachments thumbnails.
function RenderThumbnail4(e, readerEvt4) {
  var li = document.createElement("li");
  ul4.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt4.name),
    '" data-id="',
    readerEvt4.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt4.name].join("");
  document.getElementById("image-gallery4").insertBefore(ul4, null);
}
//Render attachments thumbnails.
function RenderThumbnail5(e, readerEvt5) {
  var li = document.createElement("li");
  ul5.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt5.name),
    '" data-id="',
    readerEvt5.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt5.name].join("");
  document.getElementById("image-gallery5").insertBefore(ul5, null);
}
//Render attachments thumbnails.
function RenderThumbnail6(e, readerEvt6) {
  var li = document.createElement("li");
  ul6.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt6.name),
    '" data-id="',
    readerEvt6.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt6.name].join("");
  document.getElementById("image-gallery6").insertBefore(ul6, null);
}
//Render attachments thumbnails.
function RenderThumbnail7(e, readerEvt7) {
  var li = document.createElement("li");
  ul7.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt7.name),
    '" data-id="',
    readerEvt7.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt7.name].join("");
  document.getElementById("image-gallery7").insertBefore(ul7, null);
}
//Render attachments thumbnails.
function RenderThumbnail8(e, readerEvt8) {
  var li = document.createElement("li");
  ul8.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt8.name),
    '" data-id="',
    readerEvt8.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt8.name].join("");
  document.getElementById("image-gallery8").insertBefore(ul8, null);
}

//Render attachments thumbnails.
function RenderThumbnail9(e, readerEvt9) {
  var li = document.createElement("li");
  ul9.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt9.name),
    '" data-id="',
    readerEvt9.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt9.name].join("");
  document.getElementById("image-gallery9").insertBefore(ul9, null);
}
//Render attachments thumbnails.
function RenderThumbnail10(e, readerEvt10) {
  var li = document.createElement("li");
  ul10.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap img-wrapper">' + '<a href="',
    e.target.result,
    '"><img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt10.name),
    '" data-id="',
    readerEvt10.name,
    '"/></a>' +
    '<span class="close"><i class="fa fa-trash-o"></i></span></div>',
  ].join("");

  var div = document.createElement("div");
  div.className = "file-info";
  li.appendChild(div);
  div.innerHTML = [readerEvt10.name].join("");
  document.getElementById("image-gallery10").insertBefore(ul10, null);
}
//Fill the array of attachment
function FillAttachmentArray(e, readerEvt) {
  AttachmentArray[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size,
  };
  arrCounter = arrCounter + 1;
}

//Fill the array of attachment
function FillAttachmentArray2(e, readerEvt2) {
  AttachmentArray2[arrCounter2] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt2.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt2.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt2.size,
  };
  arrCounter2 = arrCounter2 + 1;
}

function FillAttachmentArray3(e, readerEvt3) {
  AttachmentArray3[arrCounter3] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt3.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt3.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt3.size,
  };
  arrCounter3 = arrCounter3 + 1;
}

function FillAttachmentArray4(e, readerEvt4) {
  AttachmentArray4[arrCounter4] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt4.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt4.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt4.size,
  };
  arrCounter4 = arrCounter4 + 1;
}

function FillAttachmentArray5(e, readerEvt5) {
  AttachmentArray5[arrCounter5] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt5.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt5.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt5.size,
  };
  arrCounter5 = arrCounter5 + 1;
}

function FillAttachmentArray6(e, readerEvt6) {
  AttachmentArray6[arrCounter6] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt6.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt6.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt6.size,
  };
  arrCounter6 = arrCounter6 + 1;
}

function FillAttachmentArray7(e, readerEvt7) {
  AttachmentArray7[arrCounter7] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt7.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt7.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt7.size,
  };
  arrCounter7 = arrCounter7 + 1;
}

function FillAttachmentArray8(e, readerEvt8) {
  AttachmentArray8[arrCounter8] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt8.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt8.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt8.size,
  };
  arrCounter8 = arrCounter8 + 1;
}


function FillAttachmentArray9(e, readerEvt9) {
  AttachmentArray9[arrCounter9] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt9.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt9.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt9.size,
  };
  arrCounter9 = arrCounter9 + 1;
}

function FillAttachmentArray10(e, readerEvt10) {
  AttachmentArray10[arrCounter10] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt10.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt10.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt10.size,
  };
  arrCounter10 = arrCounter10 + 1;
}
