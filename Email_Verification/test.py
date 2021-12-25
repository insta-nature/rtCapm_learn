def getTotalNSqu(strs):
    strs = " "
    # strs = len(strs)
    # # print(strs)
    if(len(strs) == 4):
        strs.append(str)
        return strs
    print(strs)
    strsTemp = getTotalNSqu(str[1:])
    for i in range(len(strsTemp)):
        strs.append(str[0] + strsTemp[i])
        strs.append(str[0] + " " + strsTemp[i])
    return strs
 
Patterns = []
Patterns = getTotalNSqu("CDBC")
    
for d in Patterns:
    print(d)
# print("Total number squ: ", d)