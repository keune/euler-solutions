package main

import (
	"fmt"
)

func permute(nums, f []int) [][]int {
	p := [][]int{}
	if len(nums) <= 2 {
		reversedNums := []int{nums[1], nums[0]}
		p = append(p, append(f, nums...))
		p = append(p, append(f, reversedNums...))
	} else {
		for i := 0; i < len(nums); i++ {
			first := nums[i]
			tmp := make([]int, len(nums))
			copy(tmp, nums)
			rest := append(tmp[0:i], tmp[(i+1):]...)

			newP := permute(rest, append(f, first))
			p = append(p, newP...)
		}
	}
	return p
}

func main() {
	nums := []int{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}
	res := permute(nums, []int{})
	fmt.Println(res[999999])
}
