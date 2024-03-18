let activeStep = 0;

function handleNext() {
    if (activeStep < 2) {
        activeStep++;
        updateStep();
    }
}

function updateStep() {
    const stepperContainer = document.getElementById('stepper-container');
    const stepContentContainer = document.getElementById('step-content-container');
    const steps = ['Shipping address', 'Payment details', 'Review your order'];

    stepperContainer.innerHTML = steps.map((label, index) => `<div class="step${index === activeStep ? ' active' : ''}">${label}</div>`).join('');

    if (activeStep === 0) {
        stepContentContainer.innerHTML = document.getElementById('address-form-container').innerHTML;
    } else {
        // Handle other steps or Thank you message
        stepContentContainer.innerHTML = '<h2>Step ' + (activeStep + 1) + ' Content</h2>';
    }
}
