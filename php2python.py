import os, sys
from RVFollowupCalculator import *


def update_input_files(wlmin, wlmax, R, aperture, throughput, floor, maxtelluric, overhead, 
		       texp, sigRVphot, sigRVact, sigRVplanets, sigRVeff, 
		       P, rp, mp, 
		       mags, Ms, Rs, Teff, Z, vsini, Prot):
    # update spectrograph
    f = open('InputFiles/user_spectrograph_template.in', 'r')
    g = f.read()
    f.close()
    g = g.replace('<<wlmin>>', wlmin)
    g = g.replace('<<wlmax>>', wlmax)
    g = g.replace('<<R>>', '%i'%R)
    g = g.replace('<<aperture>>', '%.2f'%aperture)
    g = g.replace('<<throughput>>', '%.2f'%throughput)
    g = g.replace('<<floor>>', '%.2f'%floor)
    g = g.replace('<<maxtelluric>>', '%.2f'%maxtelluric)
    g = g.replace('<<overhead>>', '%.2f'%overhead)
    h = open('InputFiles/user_spectrograph.in', 'w')
    h.write(g)
    h.close()
    
    # update sigRV
    f = open('user_sigRV_template.in', 'r')
    g = f.read()
    f.close()
    g = g.replace('<<texp>>', '%.3f'%texp)
    g = g.replace('<<sigRVphot>>', '%.4f'%sigRVphot)
    g = g.replace('<<sigRVact>>', '%.4f'%sigRVact)
    g = g.replace('<<sigRVplanets>>', '%.4f'%sigRVplanets)
    g = g.replace('<<sigRVeff>>', '%.4f'%sigRVeff)
    h = open('InputFiles/user_sigRV.in', 'w')
    h.write(g)
    h.close()

    # update planet
    f = open('user_planet_template.in', 'r')
    g = f.read()
    f.close()
    g = g.replace('<<P>>', '%.4f'%P)
    g = g.replace('<<rp>>', '%.3f'%rp)
    g = g.replace('<<mp>>', '%.3f'%mp)
    h = open('InputFiles/user_planet.in', 'w')
    h.write(g)
    h.close()

    # update star
    f = open('user_star_template.in', 'r')
    g = f.read()
    f.close()
    g = g.replace('<<mags>>', ','.join(['%.2f'%i for i in mags]))
    g = g.replace('<<Ms>>', '%.3f'%Ms)
    g = g.replace('<<Rs>>', '%.3f'%Rs)
    g = g.replace('<<Teff>>', '%i'%Teff)
    g = g.replace('<<Z>>', '%.2f'%Z)
    g = g.replace('<<vsini>>', '%.2f'%vsini)
    g = g.replace('<<Prot>>', '%.2f'%Prot)    
    h = open('InputFiles/user_star.in', 'w')
    h.write(g)
    h.close()


def run_calculator(Kdetsig, duration=100, NGPtrials=1):
    runGP = True if NGPtrials > 0 else False
    nRV_calculator(Kdetsig,
                   input_planet_fname='user_planet.in',`
                   input_star_fname='user_star.in',
                   input_spectrograph_fname='user_spectrograph.in',
                   input_sigRV_fname='user_sigRV.in',
                   output_fname='RVFCoutput', duration=duration,
                   NGPtrials=NGPtrials, runGP=runGP,
		   verbose_results=True)


if __name__ == '__main__':
    assert len(sys.argv) == 26

    wlmin = float(sys.argv[1])
    wlmax = float(sys.argv[2])
    R = float(sys.argv[3])
    aperture = float(sys.argv[4])
    throughput = float(sys.argv[5])
    floor = float(sys.argv[6])
    maxtelluric = float(sys.argv[7])
    overhead = float(sys.argv[8])

    texp = float(sys.argv[9])
    sigRVphot = float(sys.argv[10])
    sigRVact = float(sys.argv[11])
    sigRVplanets = float(sys.argv[12])
    sigRVeff = float(sys.argv[13])

    P = float(sys.argv[14])
    rp = float(sys.argv[15])
    mp = float(sys.argv[16])

    mag = list(sys.argv[17])
    Ms = float(sys.argv[18])
    Rs = float(sys.argv[19])
    Teff = float(sys.argv[20])
    Z = float(sys.argv[21])
    vsini = float(sys.argv[22])
    Prot = float(sys.argv[23])

    Kdetsig = float(sys.argv[24])
    NGPtrials = float(sys.argv[25])
   
    update_input_files(wlmin, wlmax, R, aperture, throughput, floor, maxtelluric, overhead, 
		       texp, sigRVphot, sigRVact, sigRVplanets, sigRVeff,
		       P, rp, mp, 
		       mag, Ms, Rs, Teff, Z, vsini, Prot)

    #run_calulator(Kdetsig, NGPtrials=NGPtrials)
