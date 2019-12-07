package main

import (
	"fmt"
	"strconv"
)

func main() {
	str := ""
	i := 0
	for len(str) < 1000000 {
		i++
		str = str + strconv.Itoa(i)
	}

	res := 1
	for _, i := range []int{0, 9, 99, 999, 9999, 99999, 999999} {
		c, _ := strconv.Atoi(fmt.Sprintf("%c", str[i]))
		res *= c
	}

	fmt.Println(res)
}
