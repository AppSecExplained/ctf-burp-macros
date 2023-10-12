def generate_payloads(param_list, value_list):
    result = []

    for param in param_list:
        for value in value_list:
            result.append(f"{param}={value}")

    return result

if __name__ == "__main__":
    params_input = input("Please give me a comma separated list of parameters:\n> ").split(',')
    values_input = input("Please give me a comma separated list of values:\n> ").split(',')

    payloads = generate_payloads(params_input, values_input)
    
    for payload in payloads:
        print(payload)

