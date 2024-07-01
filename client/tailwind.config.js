/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{js,ts,jsx,tsx,vue}'],
  theme: {
    extend: {
      colors: {
        primaryColor: '#2F57EF',
        secondaryColor: '#B966E7',
        coralColor: '#E9967A',
        violetColor: '#800080',
        pinkColor: '#DB7093',
        blueColor: '#457B9D',
        blackColor: '#111113',
        borderColor: '#e6e3f1',
        headingColor: '#192335',
        bodyColor: '#6B7385',
        whiteColor: '#FFFFFF',
        whiteOffColor: '#FFFFFFAB',
        bodyestColor: '#273041',
        darkColor: '#27272E',
        darkerColor: '#192335',
        greyColor: 'rgba(207,207,207,0.24)',
        grayColor: '#A1A9AC',
        grayLightColor: '#F6F6F6',
        grayLighterColor: '#EBEBEB',
        extraColor: '#f9f9ff',
        primaryOpacityColor: '#2F57EF21',
        secondaryOpacityColor: '#B966E721',
        coralOpacityColor: '#E9967A21',
        violetOpacityColor: '#80008021',
        blackOpacityColor: 'rgba(0, 0, 0, 0.04)',
        whiteOpacityColor: '#FFFFFF21',
        pinkOpacityColor: '#DB709321',
        dangerOpacityColor: '#FF000310',
        warningOpacityColor: '#FF8F3C10',
        headingOpacityColor: '#19233550',
        cardColor01: '#FFFCCF',
        cardColor02: '#FFEDFF',
        cardColor03: '#FFE8EB',
        cardColor04: '#E9F6FF',
        successColor: '#3EB75E',
        dangerColor: '#FF0003',
        warningColor: '#FF8F3C',
        infoColor: '#1BA2DB'
      },
      backgroundImage: {
        overlay01: 'linear-gradient(#fff, hsla(0, 0%, 100%, .15))',
        gradient01: 'linear-gradient(90deg,#8da9fc,#b48dd5)',
        gradient02: 'linear-gradient(270deg,#9e77ff,#4460ff)',
        gradient03: 'linear-gradient(to right,#2F57EF,#B966E7,#B966E7,#2F57EF)',
        gradient04: 'linear-gradient(90deg,#2F57EF,#B966E7)',
        gradient05: 'radial-gradient(ellipse at center, #2F57EF 0, hsla(0, 0%, 100%, 0) 70%)',
        gradient06: 'linear-gradient(#2F57EF, hsla(0, 0%, 100%, 0))',
        gradient07: 'linear-gradient(90deg, #cfa2e8, #637fea)',
        gradient08: 'linear-gradient(218.15deg,#B966E7 0%,#2F57EF 100%)',
        gradient09: 'linear-gradient(#fff,#eff1ff)',
        gradient10: 'linear-gradient(90deg,hsla(0,0%,100%,.15),rgba(251,199,226,.15),rgba(220,217,254,.15))',
        gradient11: 'linear-gradient(270deg,#B966E7 0,#2F57EF 100%)'
      },
      backgroundColor: {
        overlayColor: 'rgba(0, 0, 0, .8)',
        badgeColor: 'rgba(226, 213, 252, .8)'
      },
      borderColor: {
        borderColor: '#e6e3f1',
        border02Color: '#e6e3f14f'
      },
      boxShadow: {
        shadow01: '0px 6px 34px rgba(215, 216, 222, 0.4)',
        shadow02: '0 16px 16px 0 rgba(129,104,145,0.06)',
        shadow03: '0 14px 48px 0 rgba(215,216,222,0.44)',
        shadow04: '0 12px 22px 0 rgba(214, 191, 242, 0.28)',
        shadow05: '0px 15px 30px -2px rgba(0,0,0,0.1)'
      },
      content: {
        'custom-content': 'attr(data-text)'
      }
    }
  },
  daisyui: {
    themes: []
  },
  plugins: [require('daisyui')]
}
