/** @format */

//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init3, false);
//document.addEventListener("DOMContentLoaded", init2, false);

//To save an array of attachments
var AttachmentArray3 = [];

//counter for attachment array
var arrCounter3 = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails

var ul3 = document.createElement("ul");
ul3.className = "thumb-Images3";
ul3.id = "imgList3";

function init() {
  //add javascript handlers for the file upload event

  document
    .querySelector("#files3")
    .addEventListener("change", handleFileSelect2, false);
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
        FillAttachmentArray(e, readerEvt2);
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
  });
});

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions
  /*
	if (CheckFileType(readerEvt.type) == false) {
		alert(
			"The file (" +
			readerEvt.name +
			") does not match the upload conditions, You can only upload jpg/png/gif files"
		);
		e.preventDefault();
		return;
	}
*/
  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt.size) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
}

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt2) {
  //To check file type according to upload conditions
  /*
	if (CheckFileType(readerEvt.type) == false) {
		alert(
			"The file (" +
			readerEvt.name +
			") does not match the upload conditions, You can only upload jpg/png/gif files"
		);
		e.preventDefault();
		return;
	}
*/
  //To check file Size according to upload conditions
  if (CheckFileSize(readerEvt2.size) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
    );
    e.preventDefault();
    return;
  }

  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray2) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
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
  if (fileSize < 300000000000000000000000) {
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
  if (len > 9) {
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
function FillAttachmentArray(e, readerEvt2) {
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
