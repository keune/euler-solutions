package main

import (
	"fmt"
	"strconv"
	"strings"
)

func main() {
	var str strings.Builder
	i := 0
	for str.Len() < 1000000 {
		i++
		str.WriteString(strconv.Itoa(i))
	}

	finishedStr := str.String()
	res := 1
	for _, i := range []int{0, 9, 99, 999, 9999, 99999, 999999} {
		c, _ := strconv.Atoi(fmt.Sprintf("%c", finishedStr[i]))
		res *= c
	}

	fmt.Println(res)
}
