    console.log('test')
    let currentStep = 0
    let steps = []
    let selectedAxes = []

    function initSteps(){
        steps = Array.from(document.querySelectorAll(".form-step"))
    }

    function isStepEmpty(step){
        const sections = step.querySelectorAll(".axis-section")
        if(sections.length === 0) return false
        return step.querySelectorAll(".axis-section:not(.hidden)").length === 0
    }

    function showStep(i){
        if(i < 0) i = 0
        if(i >= steps.length) i = steps.length - 1

        currentStep = i

        steps.forEach((s,index)=>{
            s.classList.toggle("hidden", index !== currentStep)
        })
    }

    // NEXT
    document.querySelectorAll(".next").forEach(btn=>{
        btn.addEventListener("click", function(){


            if(currentStep === 1){

                let checked = document.querySelectorAll(".axis-checkbox:checked")

                if(checked.length === 0){
                    document.getElementById("axis-error").classList.remove("hidden")
                    return
                }

                document.getElementById("axis-error").classList.add("hidden")

                selectedAxes = []

                checked.forEach(cb=>{
                    selectedAxes.push(cb.value)
                })

                document.querySelectorAll(".axis-section").forEach(sec=>{
                    sec.classList.toggle(
                        "hidden",
                        !selectedAxes.includes(sec.dataset.axis)
                    )
                })
            }

            let nextStep = currentStep + 1
            showStep(nextStep)
            while(nextStep < steps.length && isStepEmpty(steps[nextStep])){
                nextStep++
            }

            if(nextStep < steps.length){
                currentStep = nextStep
                showStep(currentStep)
            }

        })
    })

    // PREV
    document.querySelectorAll(".prev").forEach(btn=>{
        btn.addEventListener("click", function(){

            let prevStep = currentStep - 1

            while(prevStep >= 0 && isStepEmpty(steps[prevStep])){
                prevStep--
            }

            if(prevStep >= 0){
                currentStep = prevStep
                showStep(currentStep)
            }

        })
    })

    initSteps()
    showStep(currentStep)