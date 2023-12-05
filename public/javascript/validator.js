


// đối tượng Validator
function Validator(options) {

    function getParent(element, selector) {
         while (element.parentElement) {
            if(element.parentElement.matches(selector)) {
                return element.parentElement
            }
            element = element.parentElement
         }
    }

    var selectorRules = {}
    // Hàm thực hiện validate
    function validate(inputElement, rule){
        var formGroupFinded = getParent(inputElement, options.formGroupSelector)

        // value inputElement.value
        // test func: rule.test
            var errorElement = formGroupFinded.querySelector(options.errorSelector)
            var errorMessage

            // lấy ra các rules của selector
            var rules = selectorRules[rule.selector]
            // lặp qua từng rule(check)
            // nếu có lỗi thì dừng việc kiểm tra
            for (var i = 0; i < rules.length; i++){
                switch(inputElement.type){
                    case 'radio':
                    case 'checkbox':
                        errorMessage = rules[i](
                            formElement.querySelector(rule.selector + ':checked')
                        )
                        break
                    
                    default:
                        errorMessage = rules[i](inputElement.value)
                }

                if(errorMessage) break

            }

        if(errorMessage) {
            errorElement.innerHTML = errorMessage
            formGroupFinded.classList.add('invalid')
        } else {
            errorElement.innerHTML = ''
            formGroupFinded.classList.remove('invalid')

        }
        return !errorMessage
    }
    // Lấy element của form
    var formElement = document.querySelector(options.form)

    if(formElement){
        formElement.onsubmit = function(e) {
            e.preventDefault()

            var isFormValid = true;
            // lặp qua từng rule và validate
            options.rules.forEach(function(rule){
                var inputElement = formElement.querySelector(rule.selector)
                var isValid = validate(inputElement, rule)
                if(!isValid){
                    isFormValid = false
                }
            })

            if(isFormValid) {
                // Trường hợp submit với js
                if(typeof options.onSubmit === 'function'){

                    var enableInputs = formElement.querySelectorAll('[name]')
                    console.log(enableInputs);
                    var formValues = Array.from(enableInputs).reduce(function(values, input){
                        switch(input.type){
                            case 'radio':
                                values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value
                                break
                            case 'checkbox':
                                if(!input.matches(':checked')) {
                                    values[input.name] = []
                                    return values
                                }
                                if(!Array.isArray(values[input.name] )){
                                    values[input.name] = []
                                }
                                values[input.name].push(input.value)
                                break
                            case 'file':
                                values[input.name] = input.files
                                break
                            default:
                                values[input.name] = input.value
                        }

                        return values
                    },{});
                    options.onSubmit(formValues);
                }
                // trường hợp submit với hành vi mặt định
                else{
                    formElement.submit()
                }
            }
        }


        // lặp qua mỗi rule và xử lí (lắng nghe sự kiện blur, input,..)
        options.rules.forEach(function(rule){
            // Lưu lại các rules cho mỗi input
            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test)
            } else {
                selectorRules[rule.selector] = [rule.test]
            }
            
            var inputElements = formElement.querySelectorAll(rule.selector)

            Array.from(inputElements).forEach(function(inputElement) {
                var formGroupFinded = getParent(inputElement, options.formGroupSelector)

                // xử lí trường hợp blur khỏi input
                inputElement.onblur = function (){
                    validate(inputElement, rule)
                }

                // xử lí mỗi khi người dùm nhập vào input
                inputElement.oninput = function () {
                    var errorElement = formGroupFinded.querySelector(options.errorSelector)
                    errorElement.innerHTML = ''
                    formGroupFinded.classList.remove('invalid')
                }   
            })

        })

    }
}

// Định nghĩa rules
Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function(value){
            return value ? undefined : message || 'Vui lòng nhập trường này'
        }
    }
}

Validator.isEmail = function(selector, message) {
    return {
        selector: selector,
        test: function (value){
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
            return regex.test(value) ? undefined : message || 'Trường này phải là  email'
        }
    }

}

Validator.minLength = function(selector, min, message) {
    return {
        selector: selector,
        test: function (value){
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} kí tự`
        }
    }

}

Validator.isConfirmed = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function(value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác'
        }
    }
}
Validator.isSalePrice = function (selector, getConfirmValue, message) {
    return {
        selector: selector,
        test: function(value) {
            return value <= getConfirmValue() ? undefined : message || 'Giá trị nhập vào phải nhỏ hơn giá'
        }
    }
}
//new rule
Validator.maxLength = function(selector, max, message) {
    return {
        selector: selector,
        test: function (value){
            return value.length <= max ? undefined : message || `Vui lòng nhập tối đa ${max} kí tự`
        }
    }
}
Validator.isPhone = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            var regex = /^[0-9\-\+]{9,15}$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập đinh dạng số điện thoại'
        }
    }
}