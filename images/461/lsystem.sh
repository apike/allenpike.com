#!/bin/bash
# Generate a pbrt scene file from lsystem.py and run it to pbrt.
# Assumes "python", "lsystem.py", "project.pbrt", and "pbrt" are available in the current path.

python lsystem.py > lsystem.pbrt # Generate lsystem part of the scene
cat project.pbrt | pbrt # The render