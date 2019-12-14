package main

import "fmt"

func calcEdges(x int) int {
	e1 := x * x
	e2 := e1 - x + 1
	e3 := e2 - x + 1
	e4 := e3 - x + 1
	return e1 + e2 + e3 + e4
}

func main() {
	num := 1001
	res := 0
	for ; num > 1; num -= 2 {
		res += calcEdges(num)
	}
	fmt.Println(res + 1)
}
