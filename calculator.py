import math
def calculator():
    while True:
        c=raw_input("enter operator:")
        if(c!="log"):
            a=int(input("Enter number 1:"))
            b=int(input("Enter number 2:"))
            if(c=="+"):
                add(a,b)
                
            elif(c=="-"):
                subs(a,b)
                
            elif(c=="*"):
                mul(a,b)
                
            elif(c=="/"):
                div(a,b)
            
            
            else:
                print("invalid operator")
        else:
            a=int(input("Enter number:"))
            log(a)
            



        
def add(a,b):
    z=a+b
    print(z)
    
def div(a,b):
    total=a/float(b)
    print(total)
    
def log(a):
    math.log(a)

    
    
calculator()
