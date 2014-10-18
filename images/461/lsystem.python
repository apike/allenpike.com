# L-System scene generator
# Cmpt 461 Final Project
# Allen Pike, apike@sfu.ca

# This program takes an L-System definition, and outputs a .pbrt scene file of that model.
# The .pbrt scene file can be included into a master scene file and rendered with the
# raytracer pbrt.

## Todo: 
# Implement command-line arguments.
# Make stochastic tree.
# Make field of stochastic trees.

# Default values.

import random
import sys

n = 4
delta = 22
axiom = 'F'
productions = {}

cylRadius = 0.1 # Initial radius of segments.
leafRadius = 0.05 # Radius of leaf segments.
shrinkFactor = 1.4 # Shrinking effect of branching.

print 'Texture "b" "color" "imagemap" "string filename" "bark.exr"'
print 'Texture "l" "color" "imagemap" "string filename" "leaf.exr"'

bark = 'Material "matte" "texture Kd" "b"'
leaf = 'Material "matte" "texture Kd" "l"'

# L-System definitions.
# Comment out one of these to have it generate that L-System.

#p10-a: Koch curve
#n = 4
#delta = 90.0
#axiom = "F-F-F-F"
#productions = {'F': 'FF-F-F-F-F-F+F'}

#p10-4: Koch curve
#n = 4
#delta = 90.0
#axiom = "F-F-F-F"
#productions = {'F': 'F-F+F-F-F'}

#p12-a: Hexagonal Gosper Curve
#n = 4
#delta = 60.0
#axiom = "F"
#productions = {'F': 'F+f++f-F--FF-f+', 'f' : '-F+ff++f+F--F-f'}

#p12-a: Sierpinski gasket
#n = 6
#delta = 60.0
#axiom = "f"
#productions = {'F': 'f+F+f', 'f' : 'F-f-F'}

#p20: 3D Hilbert curve
#n = 3
#delta = 90.0
#axiom = "A"
#productions = {'A': 'B-F+CFC+F-D&F^D-F+&&CFC+F+B//', 
#				'B': 'A&F^CFB^F^D^^-F-D^|F^B|FC^F^A//',
#				'C': '|D^|F^B-F+C^F^A&&FA&F^C+F+B^F^D//',
#				'D': '|CFB-F+B|FA&F^A&&FB-F+B|FC//'}

#p25-a
#n = 5
#delta = 25.7
#axiom = "F"
#productions = {'F': 'F[+F]F[-F]F'}

#p25-c
#n = 4
#delta = 22.5
#axiom = "F"
#productions = {'F': 'FF-[-F+F+F]+[+F-F-F]'}

#p25-d
#n = 7
#delta = 20.0
#axiom = "X"
#productions = {'X': 'F[+X]F[-X]+X', 'F': 'FF'}

#p27 - flower
#n = 5
#delta = 18
#bark = leaf
#leafRadius = 0.15 # Radius of leaf segments.
#flowerColors =  ['[4.0 0.1 2.0]', '[0.1 2.0 4.0]', '[4.0 1.0 0.1]', '[4.0 5.0 2.0]', '[1.0 1.0 3.0]']
#flower = 'Material "matte" "color Kd" ' + flowerColors[random.randint(0, len(flowerColors)-1)]
#axiom = 'P'
#cylRadius = 0.3 # Initial radius of segments.
#productions = {	'P': 'I + [P + O] - - // [--L] I [++L] - [P O] ++ PO',
#				'I': 'F S [// && L] [// ^^ L] F S',
#				'S': [(33, 'S [// && L] [// ^^ L] F S'), (33, 'S F S'), (34, 'S')],  
#				'L': '[`{+f-ff-f+ | +f-ff-f}]',
#				'O': '[&&& D `/ W //// W //// W //// W //// W]',
#				'D': 'FF',
#				'W': '[`^F] [<&&&& -f+f | -f+f>]'
#			}

			
#26: bush/tree
#n = 7
#delta = 22.5
#cylRadius = 1.0
#axiom = "A"
#productions = {'A': '[&FL!A]/////`[&FL!A]///////`[&FL!A]', 
#					'F': 'S ///// F',
#					'S': 'F L',
#					'L': '[```^^{-f+f+f-|-f+f+f}]'}

#26: tree with leaves
n = 7
delta = 22.5
cylRadius = 1.0
axiom = "A"
productions = {'A': '[&FLA]/////[&FLA]///////`[&FLA]', 
					'F': 'S ///// F',
					'S': 'F',
					'L': '[Q^^Q][Q\\\\Q]'}

print '# Building L-System with %s productions and %s iterations.' % (len(productions) , n)
print '# Initial axiom is %s.' % (axiom,)

current = axiom # The working pattern
next = ""

for i in range(n): # For each iteration
	for sym in range(len(current)): # For each symbol in the current pattern
		#print '# %s: ' % (current[sym],),
		found = 0
		for search, replace in productions.iteritems(): # For each production
			if (current[sym] == search): # Found a symbol to replace
				if (type(replace) is list): # Select an option based on chance
					choice = random.randint(0, 99)
					optionsSeeked = 0
					for chance, option in replace:
						optionsSeeked = optionsSeeked + chance
						if optionsSeeked >= choice: # Found your choice
							replacement = option
							break
				else:
					replacement = replace # It's a simple string.
				next = next + replacement
				#print '%s -> %s.' % (search, replace)
				found = 1
				break
		if not found:
			#print 'copied.'
			next = next + current[sym]
	current = next # This iteration is done, pass the pattern along.
	next = ""
	print "# Iteration %s complete, having arrived at %s.\n" %(i, current)

system = current
				
# We now have the final L-System. Interpret these rules as a turtle-drawing algorithm.

# Initialize
print bark

drawSize = 1.0

for i in range(len(system)):
	if system[i] == "F" or system[i] == "f":
		print 'Shape "cylinder" "float radius" [%s] "float zmin" [0.0] "float zmax" [%s]' % (cylRadius, drawSize)
		print "Translate 0.0 0.0 %s" % (drawSize)
	elif system[i] == "+":
		print "Rotate %s 0.0 1.0 0.0" % (delta)
	elif system[i] == "-":
		print "Rotate -%s 0.0 1.0 0.0" % (delta)
	elif system[i] == "&":
		print "Rotate %s 1.0 0.0 0.0" % (delta)
	elif system[i] == "^":
		print "Rotate -%s 1.0 0.0 0.0" % (delta)
	elif system[i] == "\\":
		print "Rotate %s 0.0 0.0 1.0" % (delta)
	elif system[i] == "/":
		print "Rotate -%s 0.0 0.0 1.0" % (delta)
	elif system[i] == "|":
		print "Rotate 180 0.0 1.0 0.0"
	elif system[i] == "Q":
		print leaf
		print "Translate 0.0 0.0 %s" % (1.0 + cylRadius)
		
		rot = random.uniform(0, 80)
		rx = random.uniform(0, 0.5)
		ry = random.uniform(0, 0.5)
		rz = random.uniform(0, 0.5)
		
		print 'Rotate %s %s %s %s' % (rot, rx, ry, rz)
		print 'Shape "disk" "float radius" [%s]' % (random.uniform(0.2, 0.6))
		print 'Rotate %s -%s -%s -%s' % (rot, rx, ry, rz)
		print "Rotate 180 0.0 1.0 0.0"
		print "Translate 0.0 0.0 %s" % (1.0 + cylRadius)
		print bark
	elif system[i] == "[": # Branch.
		cylRadius = cylRadius / shrinkFactor # Shrink.
		print "AttributeBegin"
		print "Translate 0.0 0.0 %s" % (-cylRadius)
	elif system[i] == "]": # Unbranch.
		cylRadius = cylRadius * shrinkFactor # Grow.
		print "AttributeEnd"
	elif system[i] == "{" or system[i] == "<":
		storedRadius = cylRadius
		cylRadius = leafRadius
		if system[i] == "{":
			drawSize = 0.7
			print leaf
		else:
			print flower
	elif system[i] == "}" or system[i] == ">":
		cylRadius = storedRadius
		drawSize = 1.0
		print bark
	else:
		print "# Not a drawing symbol: %s" % (system[i])
