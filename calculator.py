def calculator():
    while True:
        a=int(input("Enter number 1:"))
        b=int(input("Enter number 2:"))
        c=raw_input("enter operator:")
        if(c=="+"):
            add(a,b)
def add(a,b):
    z=a+b
    print(z)


calculator()
