$( function () {
		var form = $("#input-form").show();
 
		form.steps({
		    headerTag: "h3",
		    bodyTag: "fieldset",
		    transitionEffect: "slideLeft",
		    loadingTemplate: '<span class="spinner"></span> #text#',
		    saveState:true,
		    /*Behaviours*/
		     /* Behaviour */
		    autoFocus: false,
		    enableAllSteps: false,
		    enableKeyNavigation: true,
		    enablePagination: true,
		    suppressPaginationOnFocus: true,
		    enableContentCache: true,
		    enableCancelButton: true,
		    enableFinishButton: true,
		    preloadContent: false,
		    showFinishButtonAlways: false,
		    forceMoveForward: false,
		    onStepChanging: function (event, currentIndex, newIndex)
		    {
		        // Always allow previous action even if the current form is not valid!
		        if (currentIndex > newIndex)
		        {
		            return true;
		        }
		        // Forbid next action on "Warning" step if the user is to young
		        if (newIndex === 3 && Number($("#age-2").val()) < 18)
		        {
		            return false;
		        }
		        // Needed in some cases if the user went back (clean up)
		        if (currentIndex < newIndex)
		        {
		            // To remove error styles
		            form.find(".body:eq(" + newIndex + ") label.error").remove();
		            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		        }
		        form.validate().settings.ignore = ":disabled,:hidden";
		        return form.valid();
		    },
		    onStepChanged: function (event, currentIndex, priorIndex)
		    {
		        // Used to skip the "Warning" step if the user is old enough.
		        if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
		        {
		            form.steps("next");
		        }
		        // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
		        if (currentIndex === 2 && priorIndex === 3)
		        {
		            form.steps("previous");
		        }
		    },
		    onFinishing: function (event, currentIndex)
		    {
		        form.validate().settings.ignore = ":disabled";
		        return form.valid();
		    },
		    onFinished: function (event, currentIndex)
		    {
		        alert("Submitted!");
		    },
		    onCanceled: function(event){
		    	saveState:false;
    			return currentIndex;
		    }
		}).validate({
		    errorPlacement: function errorPlacement(error, element) { element.before(error); },
		    rules: {
		        confirm: {
		            equalTo: "#password-2"
		        }
		    }
	});
});